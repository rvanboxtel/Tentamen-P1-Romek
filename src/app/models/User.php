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
    private $fname;

    /**
     * @var string
     */
    private $lname;

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
    * @var int
    */
    private $roleid;

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
        return $this->fname;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lname;
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
}