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
            0,
            $_POST['fname'],
            $_POST['lname'],
            $_POST['email'],
            $_POST['password'],
            $_POST['mobile']
        );

        View::redirect('~s1127680/P1_OOAPP_Tentamen/users');
    }
}
