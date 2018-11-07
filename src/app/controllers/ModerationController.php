<?php
/**
 * Created by PhpStorm.
 * User: romek
 * Date: 7-11-2018
 * Time: 10:14 AM
 */

namespace Romek\app\controllers;

use Exception;
use Romek\framework\Middleware;
use Romek\framework\routing\View;

final class ModerationController
{
    // requires you to be either a moderator or an admin
    public function __construct()
    {
        (new Middleware())->mustHaveOneofRoles([1,2]);
    }

    /**
     * Loads the moderation dashboard
     *
     * @throws Exception
     */
    public function index()
    {
        View::load('moderation/mdash', [

        ]);
    }
}
