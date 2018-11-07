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
        (new Middleware())->mustHaveRole(RolesRepository::BEHEERDER);
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
            'first_name' => $_POST['firstName'],
            'last_name' => $_POST['lastName'],
            'email' => $_POST['email'],
            'mobile' => $_POST['mobile'] ?? null,
            'date_of_birth' => $_POST['dateOfBirth'] ?? null,
            'nickname' => $_POST['nickname'] ?? null,
            'picture' => empty($_FILES['uploadedPicture']['tmp_name']) ? null : $_FILES['uploadedPicture']['tmp_name'],
            'reason' => $_POST['reason'] ?? null
        ]);

        RolesRepository::update((int)$_POST['user_id'], (int)$_POST['role_id']);

        View::redirect('users');
    }

    /**
     * Remove a user from the active list of users
     *
     * @throws Exception
     */
    public function destroy()
    {
        UserRepository::destroy((int)$_POST['user_id']);

        View::redirect('users');
    }
}
