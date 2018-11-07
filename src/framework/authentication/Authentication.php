<?php
declare(strict_types=1);

namespace Romek\framework\authentication;

use Romek\app\models\repositories\UserRepository;
use Romek\app\models\User;

final class Authentication
{
    /**
     * Is used to start, end and write to sessions for a user
     *
     * @var UserSession
     */
    private $userSession;

    public function __construct()
    {
        $this->userSession = new UserSession();
    }

    /**
     * Check if a user is logged in
     *
     * @return bool
     */
    public function checkIfLoggedIn(): bool
    {
        if ($this->userSession->exists()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the user class
     *
     * @return User
     * @throws \Exception
     */
    public function user(): User
    {
        if ($this->userSession->exists()) {
            return $this->userSession->get();
        }

        throw new \Exception('shouldn\'t be able to get the user if not logged in');
    }

    /**
     * Checks if the user is banned
     *
     * @param string $email
     * @return bool
     */
    public function checkIfUserIsBanned(string $email)
    {
        foreach (UserRepository::getAllBannedUsers() as $bannedUsers) {
            if ($bannedUsers->getEmail() === $email) {
                return true;
            }
        }
    }

    /**
     * Sign a user in
     *
     * @param string $email
     * @param string $password
     * @throws \Exception
     */
    public function login(string $email, string $password)
    {
        foreach (UserRepository::getAllActiveUsers() as $userFromDatabase) {

            if ($userFromDatabase->getEmail() === $email && password_verify($password, $userFromDatabase->getPassword())) {

                //set the session to the user object (in other words; log the user in)
                $this->userSession->set($userFromDatabase);
            }
        }
    }

    /**
     *  Sign a user out
     */
    public
    function logout()
    {
        $this->userSession->destroy();
    }
}
