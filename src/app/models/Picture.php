<?php
declare(strict_types=1);

namespace Team13CD\app\models;

final class Picture
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $events_id;

    /**
     * @var string
     */
    private $picture;

    /**
     * @var string
     */
    private $mime_content_type;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getEventsId(): int
    {
        return $this->events_id;
    }

    /**
     * Convert the blob into a data image
     *
     * @return string
     */
    public function getPicture(): string
    {
        if (!empty($this->picture)) {
            $imageData = base64_encode($this->picture);
            $mimeContentType = $this->getMimeContentType();

            return "data:$mimeContentType;base64,$imageData";
        }
        return '';
    }

    /**
     * Get the mime content type of the image
     *
     * @return string
     */
    public function getMimeContentType(): string
    {
        return $this->mime_content_type;
    }
}