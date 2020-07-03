<?php

namespace Trial\CoffeeMachine\Domain;

/**
 * Class Drink
 * @package Trial\CoffeeMachine\Domain
 */
abstract class Drink implements DrinkInterface
{
    /** @var string */
    protected $message = 'You have ordered a ';

    /** @var int */
    protected $status = 200;

    /** @var float */
    protected $money = 0.0;

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }
}