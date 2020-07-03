<?php

namespace Trial\CoffeeMachine\Domain;

/**
 * Class Tea
 * @package Trial\CoffeeMachine\Domain
 */
class Tea extends Drink
{
    /**
     * Tea constructor.
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
        if($this->money < 0.4)
        {
            $this->setStatus(400);
            return 'The tea costs 0.4.';
        }

        return parent::getMessage() . 'tea';
    }
}