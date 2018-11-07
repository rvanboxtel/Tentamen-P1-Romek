<?php
declare(strict_types=1);

namespace Romek\framework\authentication;

use Romek\app\models\User;

final class UserSession
{
    /**
     * The key to store a user
     */
    public const USER = 'user';

    /**
     * Check if a user session exists
     *
     * @return bool
     */
    public function exists(): bool
    {
        session_start();
        session_write_close();

        if (isset($_SESSION[self::USER])) {
            return true;
        }

        return false;
    }

    /**
     * Get the User Class from the current session
     *
     * @return User
     */
    public function get(): User
    {
        session_start();
        session_write_close();

        return $_SESSION[self::USER];
    }

    /**
     * Set the session of a user
     *
     * @param User $user
     */
    public function set(User $user)
    {
        session_start();

        $_SESSION[self::USER] = $user;

        session_write_close();
    }

    /**
     *  End a session
     */
    public function destroy()
    {
        session_start();
        session_destroy();
        session_write_close();
    }
}
