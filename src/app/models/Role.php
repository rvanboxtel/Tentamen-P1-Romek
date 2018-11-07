<?php
declare(strict_types=1);

namespace Team13CD\app\models;

use Team13CD\app\models\repositories\RolesRepository;

final class Role extends RolesRepository
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $description;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
}