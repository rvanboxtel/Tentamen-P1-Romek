<?php
declare(strict_types=1);

namespace Romek\app\controllers;

use Romek\framework\authentication\Authentication;
use Romek\framework\routing\View;
use Exception;

final class LoginController
{
    /**
     * Is used to access authentication details from a user
     *
     * @var Authentication
     */
    private $authentication;

    public function __construct()
    {
        $this->authentication = new Authentication();
    }

    /**
     * Show a form to create a user
     * @throws Exception
     */
    public function create()
    {
        if ($this->authentication->checkIfLoggedIn()) {
            View::redirect('');
        } else {
            View::load('login/create');
        }
    }

    /**
     * Store a user by trying to login with the given $_POST parameters
     *
     * @throws \Exception
     */
    public function store()
    {
        if (!$this->authentication->checkIfLoggedIn()) {
            $this->authentication->login($_POST['email'], $password = $_POST['password']);

            View::redirect('');
        }

        View::redirect('login');
    }

    /**
     *  Signout the current user
     */
    public function destroy()
    {
        if ($this->authentication->checkIfLoggedIn()) {
            $this->authentication->logout();
        }

        View::redirect('');
    }
}
