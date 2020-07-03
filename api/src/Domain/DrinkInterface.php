<?php

namespace Trial\CoffeeMachine\Domain;

/**
 * Interface DrinkInterface
 * @package Trial\CoffeeMachine\Domain
 */
interface DrinkInterface
{
    /**
     * @return string
     */
    public function getMessage();

    /**
     * @return int
     */
    public function getStatus();
}
