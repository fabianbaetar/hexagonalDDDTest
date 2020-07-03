<?php

namespace Trial\CoffeeMachine\Domain;

/**
 * Class Coffee
 * @package Trial\CoffeeMachine\Domain
 */
class Coffee extends Drink
{
    /**
     * Coffee constructor.
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
        if($this->money < 0.5)
        {
            $this->setStatus(400);
            return 'The coffee costs 0.5.';
        }

        return parent::getMessage() . 'coffee';
    }
}