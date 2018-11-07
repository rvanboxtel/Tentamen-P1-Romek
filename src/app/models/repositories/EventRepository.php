<?php
declare(strict_types=1);

namespace Team13CD\app\models\repositories;

use Team13CD\app\models\Event;
use Team13CD\app\models\Picture;
use Team13CD\framework\App;
use PDO;
echo "<pre>";
final class EventRepository
{
    /**
     * Retrieve all events from the database in an array of Event objects
     *
     * @return array
     * @throws \Exception
     */
    public static function getAll(): array
    {
        return App::get('database')->selectAll('events', 'Event');
    }

    /**
     * Store a new event and return the id
     *
     * @param string $dateEvent
     * @param string $eventName
     * @return string
     * @throws \Exception
     */
    public static function store(string $dateEvent, string $eventName): string
    {
        App::get('database')->insert('events', [
            'date_event' => $dateEvent,
            'eventname' => $eventName,
        ]);

        return App::get('database')->getPdo()->lastInsertId(); //returns the id in a string
    }

    /**
     * Store a new picture for an event
     *
     * @param int $eventsId
     * @param string $uploadedPictureTempLocation
     * @param string $mimeContentType
     * @throws \Exception
     */
    public static function storePicture(int $eventsId, string $uploadedPictureTempLocation, string $mimeContentType)
    {
        $pictureStream = fopen($uploadedPictureTempLocation, "rb");
        $queryBuilder = App::get('database');

        $statement = $queryBuilder->getPdo()->prepare("INSERT INTO pictures (events_id, picture, mime_content_type) VALUES (:events_id, :picture, :mime_content_type)");
        $statement->bindParam(':events_id', $eventsId);
        $statement->bindParam(':picture', $pictureStream, PDO::PARAM_LOB);
        $statement->bindParam(':mime_content_type', $mimeContentType);

        $statement->execute();
    }

    /**
     * Get one Game object by the GameId
     *
     * @param int $eventId
     * @return Event
     * @throws \Exception
     */
    public static function getEvent(int $eventId): Event
    {
        return App::get('database')->selectAll(
            'events',
            'Event',
            [
                [
                    'column' => 'id',
                    'condition' => '=',
                    'value' => $eventId,
                ]
            ]
        )[0]; //returns an array with ONE object, by "[0]" I get the first (and only) object from the array
    }

    /**
     * Get an array of the Picture object unless there are no pictures for the event
     *
     * @param int $eventId
     * @return array | null
     * @throws \Exception
     */
    public static function getPictures(int $eventId)
    {
        return App::get('database')->selectAll(
            'pictures',
            'Picture',
            [
                [
                    'column' => 'events_id',
                    'condition' => '=',
                    'value' => $eventId,
                ]
            ]
        );
    }

    /**
     * Remove a picture from the database
     *
     * @param int $pictureId
     * @throws \Exception
     */
    public static function destroyPicture(int $pictureId)
    {
        App::get('database')->delete('pictures', [
            [
                'column' => 'id',
                'condition' => '=',
                'value' => $pictureId
            ]
        ]);
    }

    /**
     * Update a picture in the database
     *
     * @param int $pictureId
     * @param string $uploadedPictureTempLocation
     * @param string $mimeContentType
     * @throws \Exception
     */
    public static function updatePicture(int $pictureId, string $uploadedPictureTempLocation, string $mimeContentType)
    {
        $pictureStream = fopen($uploadedPictureTempLocation, "rb");
        $queryBuilder = App::get('database');

        $statement = $queryBuilder->getPdo()->prepare("UPDATE pictures SET picture = :picture, mime_content_type = :mime_content_type WHERE id = :picture_id");
        $statement->bindParam(':picture_id', $pictureId);
        $statement->bindParam(':picture', $pictureStream, PDO::PARAM_LOB);
        $statement->bindParam(':mime_content_type', $mimeContentType);

        $statement->execute();
    }
}
