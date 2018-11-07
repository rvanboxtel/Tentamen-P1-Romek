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
        // First looks to see if a user is banned or not
        if (!$this->authentication->checkIfUserIsBanned($_POST['email'])) {
            if (!$this->authentication->checkIfLoggedIn()) {
                $this->authentication->login($_POST['email'], $password = $_POST['password']);

                View::redirect('');
            }
            View::redirect('login');
        }
        // if user is banned they get directed to a banned screen, and are forced to make a new account if they want to log in
       else {
           View::redirect('banned');
       }

    }
// loads the banned page
    public function banned(){
        View::load('login/banned');
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
