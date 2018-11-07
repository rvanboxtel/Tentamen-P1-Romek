<?php
/**
 * Created by PhpStorm.
 * User: romek
 * Date: 7-11-2018
 * Time: 10:14 AM
 */

namespace Romek\app\controllers;

use Exception;
use Romek\app\models\repositories\RolesRepository;
use Romek\framework\Middleware;
use Romek\framework\routing\View;

final class ModerationController
{
    public function __construct()
    {
        (new Middleware())->mustHaveRole(RolesRepository::Admin);
//        (new Middleware())->mustHaveRole(RolesRepository::Moderator);
    }

    /**
     * Show all users
     *
     * @throws Exception
     */
    public function index()
    {
        View::load('moderation/mdash', [

        ]);
    }
}
