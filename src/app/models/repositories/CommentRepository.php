<?php
/**
 * Created by PhpStorm.
 * User: romek
 * Date: 7-11-2018
 * Time: 12:17 PM
 */
declare(strict_types=1);

namespace Romek\app\models\repositories;


use Romek\app\models\Comment;
use Romek\framework\App;

class CommentRepository
{

    /**
     * Retrieve all Comments for events from the database in an array of Comment objects
     *
     * @param int $postId
     * @return array
     * @throws \Exception
     */
    public static function getComments(int $postId): array
    {
        $queryBuilder = App::get('database');

        $sql = sprintf(
            "SELECT c.id, c.userid, c.postid, c.comment, c.upvotes, c.downvotes, u.fname, u.lname
FROM comments c
       INNER JOIN users u on c.userid = u.id
       INNER JOIN posts p on c.postid = p.id
WHERE p.id = %s",
            $postId
        );

        $statement = $queryBuilder->getPdo()->prepare($sql);

        $statement->execute();

        return $queryBuilder->fetchAll($statement, 'Comment');
    }

    /**
     * @param int $userId
     * @param int $postId
     * @param string $comment
     * @return void
     * @throws \Exception
     */
    public static function store(int $userId, int $postId, string $comment)
    {
        App::get('database')->insert('comments', [
            'userid' => $userId,
            'postid' => $postId,
            'comment' => $comment
        ]);
    }

}