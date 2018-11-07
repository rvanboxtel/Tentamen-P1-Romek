<?php
/**
 * Created by PhpStorm.
 * User: Johan Klaver
 * Date: 3-11-2018
 * Time: 11:11
 */

namespace Team13CD\app\controllers;

use Team13CD\app\models\repositories\CommentRepository;
use Team13CD\app\models\repositories\Day2DayInformationRepository;
use Team13CD\framework\authentication\Authentication;
use Team13CD\framework\Middleware;
use Team13CD\framework\routing\View;

class Day2DayInformationController
{

    public function __construct()
    {
        (new Middleware())->mustBeLoggedIn();
    }

    /**
     * Show all users with day2dayinformation in a view
     *
     * @throws \Exception
     */
    public function index()
    {
        View::load('day2dayinformation/index', [
            'childrenWithDay2DayInformation' => Day2DayInformationRepository::getAll(),
            'Day2DayInformationRepository' => Day2DayInformationRepository::class
        ]);
    }

    /**
     * Show a form to create a day2dayinformation
     *
     * @throws \Exception
     */
    public function create()
    {
        View::load('day2dayinformation/create');
    }

    /**
     * Store a new day2dayinformation
     *
     * @throws \Exception
     */
    public function store()
    {
        $id = Day2DayInformationRepository::store(
            $_POST['childId'],
            $_POST['date'],
            $_POST['description'],
            $_POST['action']
        );

        View::redirect("day2dayinformation/edit?submitted=true&id=" . $id . "&childId=" . (int)$_GET['childId']);
    }

    /**
     * Show all day2dayinformation for a child by id on a page
     *
     * @throws \Exception
     */
    public function show()
    {
        View::load('day2dayinformation/show', [
            'commentRepository' => CommentRepository::class,
            'Day2DayInformationRepository' => Day2DayInformationRepository::class
        ]);
    }

    /**
     * Store a new comment to a day2dayinformation
     *
     * @throws \Exception
     */
    public function storeComment()
    {
        $authentication = new Authentication();

        $commentId = CommentRepository::storeDay2DayInformation(
            $authentication->user()->getId(),
            $_POST['text'],
            (int)$_POST['day2dayinformation_id']
        );

        View::redirect("day2dayinformation/show?childId={$_GET['childId']}#comment_{$commentId}");
    }

    /**
     * Show a view to edit the events page
     *
     * @throws \Exception
     */
    public function edit()
    {
        View::load('day2dayinformation/edit', [
            'Day2DayInformation' => Day2DayInformationRepository::getDay2DayInformation((int)$_GET['id'])
        ]);
    }

    /**
     * Update a day2dayinformation
     *
     * @throws \Exception
     */
    public function update()
    {
        $id = (int)$_POST['id'];

        Day2DayInformationRepository::update(
            $id,
            $_POST['date'],
            $_POST['description'],
            $_POST['action']);
        View::redirect("day2dayinformation/edit?submitted=true&id=$id&childId=" . (int)$_GET['childId']);
    }

}