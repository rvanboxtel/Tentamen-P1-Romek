<?php
declare(strict_types=1);

namespace Team13CD\app\models\repositories;

use Team13CD\app\models\Role;
use Team13CD\app\models\User;
use Team13CD\framework\App;

class RolesRepository
{
    public const BEHEERDER = 1;
    public const KIND = 2;
    public const OUDER_VOOGD = 3;
    public const WERKNEMER = 4;

    /**
     * Retrieve all roles from the database in an array of Role objects
     * @return array
     * @throws \Exception
     */
    public function getAll(): array
    {
        return App::get('database')->selectAll('roles', 'Role');
    }

    /**
     * Update a role for a user
     *
     * @param int $userId
     * @param int $roleId
     * @throws \Exception
     */
    public static function update(int $userId, int $roleId)
    {
        App::get('database')->update('users', 'roles_id', $roleId, [
            [
                'column' => 'id',
                'condition' => '=',
                'value' => $userId
            ]
        ]);
    }

    /**
     * Get the Role object from a user by user id
     *
     * @param int $userId
     * @return Role
     * @throws \Exception
     */
    public static function getUserRole(int $userId): Role
    {
        $user = App::get('database')->selectAll(
            'users',
            null,
            [
                [
                    'column' => 'id',
                    'condition' => '=',
                    'value' => $userId,
                ]
            ]
        )[0]; //returns an array with ONE object, by "[0]" I get the first (and only) object from the array

        return App::get('database')->selectAll(
            'roles',
            'Role',
            [
                [
                    'column' => 'id',
                    'condition' => '=',
                    'value' => $user->roles_id,
                ]
            ]
        )[0]; //returns an array with ONE object, by "[0]" I get the first (and only) object from the array
    }
}