<?php
/**
 * Created by PhpStorm.
 * User: romek
 * Date: 2-11-2018
 * Time: 03:50 PM
 */
declare(strict_types=1);

namespace Team13CD\app\models;

final class Comment
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $users_id;

    /**
     * @var string
     */
    private $text;


    /**
     * @var int
     */

    private $votes;

    /**
     * @var string
     */


    private $nickname;

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
    public function getUsersId(): int
    {
        return $this->users_id;
    }


    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }


    public function getNick(): string
    {
        return $this->nickname;
    }
}