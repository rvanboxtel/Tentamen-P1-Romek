<?php
/**
 * Created by PhpStorm.
 * User: Johan Klaver
 */

declare(strict_types=1);

namespace Team13CD\app\models\repositories;

use Team13CD\framework\App;
use Team13CD\framework\authentication\Authentication;
use Team13CD\app\models\Day2DayInformation;

final class Day2DayInformationRepository
{

    /**
     * Retrieve all Day2DayInformation from the database
     *
     * @param Id of the user for which all Day2DayInformation must be retrieved. retrieves for all users if left blank
     *
     * @return array
     * @throws \Exception
     */
    public static function getAll(): array
    {
        $userId = @(int)(func_get_arg(0));//Int cast to prevent SQL injection

        $stmt = App::get('database')->getPDO()->query("select users.id AS users_id, first_name, last_name, is_deleted,
                users.roles_id,
                 nickname, picture, day2dayinformation.id as day2dayinformation_id,
                 `action`, day2dayinformation.description AS description,
                 `date`
                 from users
                 JOIN roles ON users.roles_id = roles.id 
                 LEFT OUTER JOIN users_day2dayinformation
                 ON users_day2dayinformation.users_id = users.id 
                 JOIN day2dayinformation ON day2dayinformation.id = users_day2dayinformation.day2dayinformation_id 
                 WHERE users.roles_id = 2
                 
                 ORDER BY day2dayinformation_id  DESC");

        $result = array();

        while ($row = $stmt->fetch()) {
            $result[] = $row;
        };

        return $result;
    }

    /**
     * Get Day2DayInformation object by the Day2DayInformation id
     *
     * @param int $id the Day2DayInformation id
     * @return Day2DayInformation
     * @throws \Exception
     */
    public static function getDay2DayInformation(int $id): Day2DayInformation
    {
        return App::get('database')->selectAll(
            'day2dayinformation',
            'Day2DayInformation',
            [
                [
                    'column' => 'id',
                    'condition' => '=',
                    'value' => $id,
                ]
            ]
        )[0];
    }

    /**
     * Store a new day2dayinformation and return the id
     *
     * @param int $childId
     * @param string $date
     * @param string $description
     * @param string $action
     * @return string
     * @throws \Exception
     */
    public static function store($childId, string $date, string $description, string $action): string
    {
        App::get('database')->insert('day2dayinformation', [
            'date' => $date,
            'description' => $description,
            'action' => $action
        ]);

        $day2dayinformation_id = App::get('database')->getPdo()->lastInsertId();

        //Store association with child
        App::get('database')->insert('users_day2dayinformation', [
            'users_id' => $childId,
            'day2dayinformation_id' => $day2dayinformation_id,
        ]);

        //Store association with employee
        $authentication = new Authentication();
        App::get('database')->insert('users_day2dayinformation', [
            'users_id' => $authentication->user()->getId(),
            'day2dayinformation_id' => $day2dayinformation_id,
        ]);

        return $day2dayinformation_id; //returns the id in a string
    }


    /**
     * Update existing day2dayinformation and return the id
     *
     * @param int $day2DayInformationId
     * @param string $date
     * @param string $description
     * @param string action
     * @return string
     * @throws \Exception
     */
    public static function update(int $day2DayInformationId, string $date, string $description, string $action): string
    {
        $stmt = App::get('database')->getPdo()->prepare("UPDATE `gezinshuis`.`day2dayinformation` SET `action` = :action, `description` = :description, date = :date WHERE (`id` = :id)");

        $stmt->execute(array(':date' => $date, ':action' => $action, ':description' => $description, ':id' => $day2DayInformationId));

        return App::get('database')->getPdo()->lastInsertId(); //returns the id in a string
    }

}
