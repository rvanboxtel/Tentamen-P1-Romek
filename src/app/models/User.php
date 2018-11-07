<?php
declare(strict_types=1);

namespace Romek\app\models;

class User
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $first_name;

    /**
     * @var string
     */
    private $last_name;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $mobile;

    /**
     * @var string
     */
    private $date_of_birth;

    /**
     * @var string
     */
    private $nickname;

    /**
     * @var string
     */
    private $picture;

    /**
     * @var string
     */
    private $mime_content_type;

    /**
     * @var string
     */
    private $reason;

    /**
     * @return int
     */
    public function getId(): int
    {
        return (int)$this->id;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->first_name;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->last_name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getMobile(): string
    {
        return $this->mobile;
    }

    /**
     * @return string
     */
    public function getDateOfBirth(): string
    {
        return $this->date_of_birth;
    }

    /**
     * @return string
     */
    public function getNickname(): string
    {
        return $this->nickname;
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
     * @return string
     */
    public function getReason(): string
    {
        return $this->reason;
    }

    /**
     * @return string
     */
    public function getMimeContentType(): string
    {
        return $this->mime_content_type;
    }
}
