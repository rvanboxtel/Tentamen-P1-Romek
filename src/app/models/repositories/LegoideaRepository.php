<?php
/**
 * Created by PhpStorm.
 * User: romek
 * Date: 7-11-2018
 * Time: 12:31 PM
 */
declare(strict_types=1);

namespace Romek\app\models\repositories;

use Romek\app\models\Legoidea;
use Romek\framework\App;
use Romek\app\models\User;

//repository for the lego ideas
final class LegoideaRepository
{
    /**
     *
     * Gets the required Idea
     *
     * @param int $ideaId
     * @return Legoidea
     * @throws \Exception
     */

    public static function getIdea(int $ideaId): Legoidea
    {
        return App::get('database')->selectAll(
            'legoideas',
            'Legoidea',
            [
                [
                    'column' => 'postid',
                    'condition' => '=',
                    'value' => $ideaId,
                ]
            ]
        )[0]; //returns an array with ONE object, by "[0]" I get the first (and only) object from the array
    }


}