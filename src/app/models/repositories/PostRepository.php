<?php
/**
 * Created by PhpStorm.
 * User: romek
 * Date: 7-11-2018
 * Time: 11:41 AM
 */
declare(strict_types=1);

namespace Romek\app\models\repositories;

use romek\framework\App;
use Romek\framework\routing\View;

//Repository for posts

final class PostRepository
{
    /**
     * Retrieve all Posts to be shown
     *
     * @return array
     * @throws \Exception
     */
    public static function getAllPosts(): array
    {
        return App::get('database')->selectAll('posts', 'Post');

    }


    /**
     *  Posting the Post and the idea
     *
     * @param int $userid
     * @param string $name
     * @param string $description
     * @param string $step01
     * @param string $pieces01
     * @param string $step02
     * @param string $pieces02
     * @param string $step03
     * @param string $pieces03
     * @param string $step04
     * @param string $pieces04
     * @param string $step05
     * @param string $pieces05
     * @param string $step06
     * @param string $pieces06
     * @throws \Exception
     */
    public static function postPost(int $userid, string $name, string $description, string $step01, string $pieces01, string $step02, string $pieces02, string $step03, string $pieces03, string $step04, string $pieces04, string $step05, string $pieces05, string $step06, string $pieces06)
    {
        App::get('database')->insert('posts', [
            'name' => $name,
            'description' => $description
        ]);

        // grabs the last posted id on the database and send it with the other send data to the last insert
        self::postLegoIdea($userid, $postId = (int)(App::get('database')->getPdo()->lastInsertId()), $name, $description, $step01, $pieces01, $step02, $pieces02, $step03, $pieces03, $step04, $pieces04, $step05, $pieces05, $step06, $pieces06);

    }

    /**
     * posting the LegoIdea
     *
     * @param int $userid
     * @param int $postId
     * @param string $name
     * @param string $description
     * @param string $step01
     * @param string $pieces01
     * @param string $step02
     * @param string $pieces02
     * @param string $step03
     * @param string $pieces03
     * @param string $step04
     * @param string $pieces04
     * @param string $step05
     * @param string $pieces05
     * @param string $step06
     * @param string $pieces06
     * @throws \Exception
     */
    public static function postLegoIdea(int $userid, int $postId, string $name, string $description, string $step01, string $pieces01, string $step02, string $pieces02, string $step03, string $pieces03, string $step04, string $pieces04, string $step05, string $pieces05, string $step06, string $pieces06)
    {
        App::get('database')->insert('legoideas', [
            'userid' => $userid,
            'postid' => $postId,
            'name' => $name,
            'description' => $description,
            'step01' => $step01,
            'pieces01' => $pieces01,
            'step02' => $step02,
            'pieces02' => $pieces02,
            'step03' => $step03,
            'pieces03' => $pieces03,
            'step04' => $step04,
            'pieces04' => $pieces04,
            'step05' => $step05,
            'pieces05' => $pieces05,
            'step06' => $step06,
            'pieces06' => $pieces06,
        ]);
        View::redirect("builds?id={$postId}");
    }

}