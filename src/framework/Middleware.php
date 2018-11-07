<?php
declare(strict_types=1);

namespace Romek\framework;

use Romek\app\models\repositories\RolesRepository;
use Romek\framework\authentication\Authentication;
use Romek\framework\routing\View;

final class Middleware
{
    /**
     * Used to retrieve authentication data from a user
     * @var Authentication
     */
    private $authentication;

    public function __construct()
    {
        $this->authentication = new Authentication();
    }

    /**
     *  Require the user to be logged in
     */
    public function mustBeLoggedIn()
    {
        if ($this->authentication->checkIfLoggedIn()) {
            return;
        }

        $this->redirectAndExit();
    }

    /**
     * Require the user to have a specific role
     *
     * @param int $requiredRoleId
     * @throws \Exception
     */
    public function mustHaveRole(int $requiredRoleId)
    {
        $this->mustBeLoggedIn();

        $roleId = RolesRepository::getUserRole($this->authentication->user()->getId())->getId();

        if ($roleId === $requiredRoleId) {
            return;
        }

        $this->redirectAndExit();
    }

    /**
     * Require the user to have a specific role from an array
     *
     * @param array $requiredRoleIds
     * @throws \Exception
     */
    public function mustHaveOneOfRoles(array $requiredRoleIds)
    {
        $this->mustBeLoggedIn();

        if (in_array(RolesRepository::getUserRole($this->authentication->user()->getId())->getId(), $requiredRoleIds)) {
            return;
        }

        $this->redirectAndExit();
    }

    /**
     * Method to redirect someone to the home page and stop executing code;
     */
    private function redirectAndExit()
    {
        View::redirect('~s1127680/P1_OOAPP_Tentamen');
        exit();
    }
}