<?php

namespace Trial\CoffeeMachine\Domain;

/**
 * Class Chocolate
 * @package Trial\CoffeeMachine\Domain
 */
class Chocolate extends Drink
{
    /**
     * Chocolate constructor.
     * @param $money
     */
    public function __construct($money)
    {
        $this->money = $money;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        if($this->money < 0.6)
        {
            $this->setStatus(400);
            return 'The chocolate costs 0.6.';
        }

        return parent::getMessage() . 'chocolate';
    }
}