<?php
declare(strict_types=1);

namespace Romek\app\controllers;

use Romek\app\models\repositories\RolesRepository;
use Romek\app\models\repositories\UserRepository;
use Romek\framework\Middleware;
use Romek\framework\routing\View;

final class RegistrationController
{
    public function __construct()
    {
        (new Middleware())->mustHaveRole(RolesRepository::BEHEERDER);
    }

    /**
     * Show the registration page
     * @throws \Exception
     */
    public function create()
    {
        View::load('registration/create', [
            'roles' => RolesRepository::class
        ]);
    }

    /**
     * Store a new user
     *
     * @throws \Exception
     */
    public function store()
    {
        UserRepository::store(
            (int)$_POST['rolesId'],
            $_POST['firstName'],
            $_POST['lastName'],
            $_POST['email'],
            $_POST['password'],
            $_POST['mobile'] ?? null,
            $_POST['dateOfBirth'] ?? null,
            $_POST['nickname'] ?? null,
            $_POST['reason'] ?? null,
            empty($_FILES['uploadedPicture']['tmp_name']) ? null : $_FILES['uploadedPicture']['tmp_name'],
            empty($_FILES['uploadedPicture']['tmp_name']) ? null : mime_content_type($_FILES['uploadedPicture']['tmp_name'])
        );

        View::redirect('users');
    }
}
