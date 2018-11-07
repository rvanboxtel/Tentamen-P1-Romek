<?php
declare(strict_types=1);

namespace Team13CD\app\models;

final class Event
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $date_event;

    /**
     * @var string
     */
    private $eventname;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getDateEvent(): string
    {
        return $this->date_event;
    }

    /**
     * @return string
     */
    public function getEventname(): string
    {
        return $this->eventname;
    }
}