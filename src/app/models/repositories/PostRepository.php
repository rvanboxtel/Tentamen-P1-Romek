<?php
/**
 * Created by PhpStorm.
 * User: romek
 * Date: 7-11-2018
 * Time: 11:41 AM
 */

namespace Romek\app\models\repositories;

use romek\app\models\Posts;
use romek\framework\App;

// Repository for comments

final class PostRepository
{
    /**
     * Retrieve all Comments for events from the database in an array of Comment objects
     *
     * @return array
     * @throws \Exception
     */
    public static function getAllPosts(): array
    {
        return App::get('database')->selectAll('posts', 'Posts');

    }


}