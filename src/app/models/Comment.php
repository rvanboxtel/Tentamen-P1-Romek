<?php
/**
 * Model for Comments
 *
 * Created by PhpStorm.
 * User: romek
 * Date: 7-11-2018
 * Time: 01:44 PM
 */
declare(strict_types=1);

namespace Romek\app\models;

final class Comment
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $userid;

    /**
     * @var int
     */
    private $postid;

    /**
     * @var string
     */
    private $text;

    /**
     * @var int
     */
    private $upvotes;

    /**
     * @var int
     */
    private $downvotes;

    /**
     * @var string
     */
    private $fname;

    /**
     * @var string
     */
    private $lname;


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
    public function getUserId(): int
    {
        return $this->userid;
    }
    /**
     * @return int
     */
    public function getPostId(): int
    {
        return $this->postid;
    }


    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->comment;
    }


    /**
     * @return string
     */
    public function getNick(): string
    {
        return $this->fname . " " . $this->lname;
    }
}