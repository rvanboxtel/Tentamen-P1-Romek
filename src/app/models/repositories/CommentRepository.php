<?php
/**
 * Created by PhpStorm.
 * User: romek
 * Date: 2-11-2018
 * Time: 03:49 PM
 */
declare (strict_types=1);

namespace Team13CD\app\models\repositories;

use Team13CD\app\models\Comment;
use Team13CD\framework\App;

// Repository for comments

final class CommentRepository
{

    /**
     * Retrieve all Comments for events from the database in an array of Comment objects
     *
     * @param int $eventId
     * @return array
     * @throws \Exception
     */
    public static function getCommentsForEvents(int $eventId): array
    {
        $queryBuilder = App::get('database');

        $sql = sprintf(
            "SELECT c.id, c.text, c.votes, u.nickname
FROM comments c
       INNER JOIN comments_events ce on c.id = ce.comments_id
       INNER JOIN events e on ce.events_id = e.id
       INNER JOIN users u on c.users_id = u.id
WHERE e.id = %s",
            $eventId
        );

        $statement = $queryBuilder->getPdo()->prepare($sql);

        $statement->execute();

        return $queryBuilder->fetchAll($statement, 'Comment');
    }

    /**
     * Retrieve all Comments for Day2Day from the database in an array of Comment objects
     *
     * @param int $dayToDayId
     * @return array
     * @throws \Exception
     */
    public static function getCommentsForDay2DayInformation(int $dayToDayId): array
    {
        $queryBuilder = App::get('database');

        $sql = sprintf(
            "SELECT c.id, c.text, c.votes, u.nickname
FROM comments c
       INNER JOIN comments_day2dayinformation cd on c.id = cd.comments_id
       INNER JOIN day2dayinformation d on cd.day2dayinformation_id = d.id
       INNER JOIN users u on c.users_id = u.id
WHERE d.id = %s",
            $dayToDayId
        );

        $statement = $queryBuilder->getPdo()->prepare($sql);

        $statement->execute();

        return $queryBuilder->fetchAll($statement, 'Comment');
    }

    /**
     *  to store comments for events
     *
     * @param int $userId
     * @param string $text
     * @param int $events_id
     * @throws \Exception
     */
    public static function storeEvent(int $userId, string $text, int $events_id)
    {
        App::get('database')->insert('comments', [
            'users_id' => $userId,
            'text' => $text,
        ]);

        self::storeConnectionEvent((int)(App::get('database')->getPdo()->lastInsertId()), $events_id);
    }

    /**
     * @param int $commentID
     * @param int $events_id
     * @throws \Exception
     */
    public static function storeConnectionEvent(int $commentID, int $events_id)
    {
        App::get('database')->insert('comments_events', [
            'comments_id' => $commentID,
            'events_id' => $events_id,
        ]);
    }


    /**
     *  to store comments for Day2DayInformation
     *
     * @param int $userId
     * @param string $text
     * @param int $day2dayInformation_id
     * @throws \Exception
     *
     * @return int $commentId of the comment that was just inserted
     */
    public static function storeDay2DayInformation(int $userId, string $text, int $day2dayInformation_id)
    {
        App::get('database')->insert('comments', [
            'users_id' => $userId,
            'text' => $text,
        ]);

        $commentId = (int)(App::get('database')->getPdo()->lastInsertId());

        self::storeConnectionDay2DayInformation($commentId, $day2dayInformation_id);

        return $commentId;
    }

    /**
     * @param int $commentID
     * @param int $day2dayInformation_id
     * @throws \Exception
     */
    public static function storeConnectionDay2DayInformation(int $commentID, int $day2dayInformation_id)
    {
        App::get('database')->insert('comments_day2dayinformation', [
            'comments_id' => $commentID,
            'day2dayinformation_id' => $day2dayInformation_id,
        ]);
    }

}
