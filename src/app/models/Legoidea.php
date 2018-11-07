<?php
/**
 * Created by PhpStorm.
 * User: romek
 * Date: 7-11-2018
 * Time: 11:36 AM
 */
declare(strict_types=1);

namespace Romek\app\models;


class Legoidea
{

    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $postid;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $step01;

    /**
     * @var string
     */
    private $pieces01;

    /**
     * @var string
     */
    private $step02;

    /**
     * @var string
     */
    private $pieces02;

    /**
     * @var string
     */
    private $step03;

    /**
     * @var string
     */
    private $pieces03;

    /**
     * @var string
     */
    private $step04;

    /**
     * @var string
     */
    private $pieces04;

    /**
     * @var string
     */
    private $step05;

    /**
     * @var string
     */
    private $pieces05;

    /**
     * @var string
     */
    private $step06;

    /**
     * @var string
     */
    private $pieces06;

    /**
     * @return int
     */
    public function getId(): int
    {
        return (int)$this->id;
    }

    /**
     * @return int
     */
    public function getPost(): int
    {
        return $this->postid;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDesc(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getStep1(): string
    {
        return $this->step01;
    }

    /**
     * @return string
     */
    public function getPieces1(): string
    {
        return $this->pieces01;
    }


    /**
     * @return string
     */
    public function getStep2(): string
    {
        return $this->step02;
    }

    /**
     * @return string
     */
    public function getPieces2(): string
    {
        return $this->pieces02;
    }

    /**
     * @return string
     */
    public function getStep3(): string
    {
        return $this->step03;
    }

    /**
     * @return string
     */
    public function getPieces3(): string
    {
        return $this->pieces03;
    }

    /**
     * @return string
     */
    public function getStep4(): string
    {
        return $this->step04;
    }

    /**
     * @return string
     */
    public function getPieces4(): string
    {
        return $this->pieces04;
    }

    /**
     * @return string
     */
    public function getStep5(): string
    {
        return $this->step05;
    }

    /**
     * @return string
     */
    public function getPieces5(): string
    {
        return $this->pieces05;
    }

    /**
     * @return string
     */
    public function getStep6(): string
    {
        return $this->step06;
    }

    /**
     * @return string
     */
    public function getPieces6(): string
    {
        return $this->pieces06;
    }
}