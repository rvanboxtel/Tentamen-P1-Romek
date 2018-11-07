<?php
declare(strict_types=1);

namespace Romek\app\controllers;

use Exception;
use Romek\app\models\repositories\RolesRepository;
use Romek\app\models\repositories\UserRepository;
use Romek\framework\Middleware;
use Romek\framework\routing\View;

final class UsersController
{
    public function __construct()
    {
        (new Middleware())->mustHaveRole(RolesRepository::Admin);
    }

    /**
     * Show all users
     *
     * @throws Exception
     */
    public function index()
    {
        View::load('users/index', [
            'users' => UserRepository::getAllActiveUsers(),
            'roles' => RolesRepository::class
        ]);
    }

    /**
     * Show a page to edit the users value in a form
     *
     * @throws \Exception
     */
    public function edit()
    {
        View::load('users/edit', [
            'user' => UserRepository::getUser((int)$_GET['user_id']),
            'roles' => RolesRepository::class
        ]);
    }

    /**
     * Update a users value
     * @throws Exception
     */
    public function update()
    {
        UserRepository::updateById((int)$_POST['user_id'], [
            'fname' => $_POST['fname'],
            'lname' => $_POST['lname'],
            'email' => $_POST['email'],
            'mobile' => $_POST['mobile'],
            'roleid' => $_POST['roleid']
        ]);

        RolesRepository::update((int)$_POST['userid'], (int)$_POST['roleid']);

        View::redirect('~s1127680/P1_OOAPP_Tentamen/users');
    }

    /**
     * Bans a member from using his account
     *
     * @throws Exception
     */
    public function ban()
    {
        UserRepository::ban((int)$_POST['user_id']);

        View::redirect('~s1127680/P1_OOAPP_Tentamen/users');
    }

    /**
     * Remove a user from the active list of users
     *
     * @throws Exception
     */
    public function destroy()
    {
        UserRepository::destroy((int)$_POST['user_id']);

        View::redirect('~s1127680/P1_OOAPP_Tentamen/users');
    }
}
