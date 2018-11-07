<?php
declare(strict_types=1);

namespace Team13CD\app\controllers;

use Team13CD\app\models\repositories\CommentRepository;
use Team13CD\app\models\repositories\EventRepository;
use Team13CD\app\models\repositories\RolesRepository;
use Team13CD\framework\Middleware;
use Team13CD\framework\routing\View;
use Team13CD\framework\authentication\Authentication;

final class EventsController
{
    private $middleware;

    public function __construct()
    {
        $this->middleware = new Middleware();
        $this->middleware->mustBeLoggedIn();
    }

    /**
     * Show all events in a view
     *
     * @throws \Exception
     */
    public function index()
    {
        View::load('events/index', [
            'eventRepository' => EventRepository::class
        ]);
    }

    /**
     * Show a form to create an event
     *
     * @throws \Exception
     */
    public function create()
    {
        $this->middleware->mustHaveOneOfRoles([RolesRepository::BEHEERDER, RolesRepository::WERKNEMER]);
        View::load('events/create');
    }

    /**
     * Store a new event
     *
     * @throws \Exception
     */
    public function store()
    {
        $this->middleware->mustHaveOneOfRoles([RolesRepository::BEHEERDER, RolesRepository::WERKNEMER]);
        $id = EventRepository::store(
            $_POST['date_event'],
            $_POST['eventname']
        );

        View::redirect("events/edit?id=$id");
    }

    /**
     * Show an event by id on a page
     *
     * @throws \Exception
     */
    public function show()
    {
        View::load('events/show', [
            'eventRepository' => EventRepository::class,
            'commentRepository' => CommentRepository::class
        ]);
    }

    /**
     * Store a new picture to an event
     *
     * @throws \Exception
     */
    public function storePicture()
    {
        $this->middleware->mustHaveOneOfRoles([RolesRepository::BEHEERDER, RolesRepository::WERKNEMER]);
        EventRepository::storePicture(
            (int)$_POST['events_id'],
            $_FILES['uploadedPicture']['tmp_name'],
            mime_content_type($_FILES['uploadedPicture']['tmp_name'])
        );

        View::redirect("events/edit?id={$_POST['events_id']}");
    }

    /**
     * Remove a picture from an event
     * @throws \Exception
     */
    public function destroyPicture()
    {
        $this->middleware->mustHaveOneOfRoles([RolesRepository::BEHEERDER, RolesRepository::WERKNEMER]);
        EventRepository::destroyPicture(
            (int)$_POST['pictureId']
        );

        View::redirect("events/edit?id={$_POST['events_id']}");
    }

    /**
     * Update a picture from an event
     * @throws \Exception
     */
    public function updatePicture()
    {
        $this->middleware->mustHaveOneOfRoles([RolesRepository::BEHEERDER, RolesRepository::WERKNEMER]);
        EventRepository::updatePicture(
            (int)$_POST['pictureId'],
            $_FILES['uploadedPicture']['tmp_name'],
            mime_content_type($_FILES['uploadedPicture']['tmp_name'])
        );

        View::redirect("events/edit?id={$_POST['events_id']}");
    }

    /**
     * Store a new comment to an event
     *
     * @throws \Exception
     */
    public function storeComment()
    {
        $authentication = new Authentication();
        CommentRepository::storeEvent(
            $authentication->user()->getId(),
            $_POST['text'],
            (int)$_POST['events_id']
        );
        View::redirect("events/show?id={$_POST['events_id']}");
    }

    /**
     * Show a view to edit the events page
     *
     * @throws \Exception
     */
    public function edit()
    {
        $this->middleware->mustHaveOneOfRoles([RolesRepository::BEHEERDER, RolesRepository::WERKNEMER]);
        View::load('events/edit', [
            'eventRepository' => EventRepository::class
        ]);
    }
}