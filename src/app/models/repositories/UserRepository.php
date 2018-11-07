<?php
declare(strict_types=1);

namespace Romek\app\models\repositories;

use PDO;
use Romek\app\models\User;
use Romek\framework\App;
use Romek\framework\routing\View;

final class UserRepository extends User
{
    /**
     * Insert a user into the database
     *
     * @param int $rolesId
     * @param string $fname
     * @param string $lname
     * @param string $email
     * @param string $password
     * @param string $mobile
     * @throws \Exception
     */
    public static function store(
        int $rolesId,
        string $fname,
        string $lname,
        string $email,
        string $password,
        string $mobile
    )
    {
        App::get('database')->insert('users', [
            'roleid' => $rolesId,
            'fname' => $fname,
            'lname' => $lname,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'mobile' => $mobile
        ]);
    }

    /**
     * Retrieve all users from the database in an array of User objects
     *
     * @return array
     * @throws \Exception
     */
    public static function getAllActiveUsers(): array
    {
        return App::get('database')->selectAll('users', 'User',
            [
                [
                    'column' => 'is_deleted',
                    'condition' => '=',
                    'value' => false,
                ]
            ]
        );
    }
    public static function getAllBannedUsers(): array
    {
        return App::get('database')->selectAll('users', 'User',
            [
                [
                    'column' => 'is_banned',
                    'condition' => '=',
                    'value' => true,
                ]
            ]
        );
    }

    /**
     * Get a User object by the user id
     *
     * @param int $userId
     * @return mixed
     * @throws \Exception
     */
    public static function getUser(int $userId): User
    {
        return App::get('database')->selectAll(
            'users',
            'User',
            [
                [
                    'column' => 'id',
                    'condition' => '=',
                    'value' => $userId,
                ]
            ]
        )[0]; //returns an array with ONE object, by "[0]" I get the first (and only) object from the array
    }

    /**
     * Foreach parameter, update the value for a user
     *
     * @param int $userId
     * @param array $parameters
     * @throws \Exception
     */
    public static function updateById(int $userId, array $parameters)
    {
        foreach ($parameters as $key => $value) {
            App::get('database')->update('users', $key, $value, [
                [
                    'column' => 'id',
                    'condition' => '=',
                    'value' => $userId
                ]
            ]);
        }
    }

    /**
     * @param int $userId
     * @throws \Exception
     */
    public static function ban(int $userId) {
        App::get('database')->update('users', 'is_banned', true, [
            [
                'column' => 'id',
                'condition' => '=',
                'value' => $userId
            ]
        ]);
    }

    /**
     * Set the is_deleted value in the database to true
     *
     * @param int $userId
     * @throws \Exception
     */
    public static function destroy(int $userId)
    {
        App::get('database')->update('users', 'is_deleted', true, [
            [
                'column' => 'id',
                'condition' => '=',
                'value' => $userId
            ]
        ]);
    }
}
