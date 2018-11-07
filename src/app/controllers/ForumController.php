<?php
/**
 * Created by PhpStorm.
 * User: romek
 * Date: 7-11-2018
 * Time: 11:43 AM
 */

namespace Romek\app\controllers;

use Romek\app\models\repositories\LegoideaRepository;
use Romek\app\models\repositories\PostRepository;
use Romek\app\models\repositories\CommentRepository;
use Romek\framework\routing\View;
use Romek\framework\authentication\Authentication;
use Romek\framework\Middleware;


final class ForumController
{


    /**
     * Display the main forum page
     *
     * @throws \Exception
     */
    public function index()
    {
        View::load('forum/index', ['postrepository' => PostRepository::class,]);
    }

    /**
     * @throws \Exception
     */
    public function create()
    {
        $test = new Middleware();
        $test->mustHaveOneofRoles([0, 1, 2]);
        View::load('forum/create');
    }

    /**
     * Display the chosen post + its comments
     *
     * @throws \Exception
     */
    public function show()
    {
        View::load('forum/builds', [
            'idea' => LegoideaRepository::getIdea((int)$_GET['id']),
            'comments' => CommentRepository::getComments((int)$_GET['id']),
        ]);
    }

    /**
     * Makes you able to store new comments in the database
     *
     */
    public function comment()
    {
        $authentication = new Authentication();
        CommentRepository::store(
            $authentication->user()->getId(),
            (int)$_POST['id'],
            $_POST['comment']

        );
        View::redirect("builds?id={$_POST['id']}");
    }

    /**
     *  Makes sure to post the new post
     * @throws \Exception
     */
    public function post()
    {
        $authentication = new Authentication();
        PostRepository::postPost(
            $authentication->user()->getId(),
            $_POST['name'],
            $_POST['description'],
            $_POST['step01'],
            $_POST['pieces01'],
            $_POST['step02'],
            $_POST['pieces02'],
            $_POST['step03'],
            $_POST['pieces03'],
            $_POST['step04'],
            $_POST['pieces04'],
            $_POST['step05'],
            $_POST['pieces05'],
            $_POST['step06'],
            $_POST['pieces06']
        );



    }

}