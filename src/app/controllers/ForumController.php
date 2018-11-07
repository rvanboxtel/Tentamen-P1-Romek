<?php
/**
 * Created by PhpStorm.
 * User: romek
 * Date: 7-11-2018
 * Time: 11:43 AM
 */

namespace Romek\app\controllers;

use Exception;
use Romek\app\models\repositories\PostRepository;
use Romek\framework\routing\View;



final class ForumController
{


    /**
     * Display the main forum page
     *
     * @throws \Exception
     */
    public function index()
    {
        View::load('forum/index', ['posts' => PostRepository::getAllPosts(),]);
    }
}