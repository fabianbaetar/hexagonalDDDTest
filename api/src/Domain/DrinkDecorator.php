<?php

namespace Trial\CoffeeMachine\Domain;

/**
 * Class DrinkDecorator
 * @package Trial\CoffeeMachine\Domain
 */
abstract class DrinkDecorator implements DrinkInterface
{
    /** @var Drink */
    protected $drink;

    /**
     * DrinkDecorator constructor.
     * @param DrinkInterface $drink
     */
    public function __construct(DrinkInterface $drink)
    {
        $this->drink = $drink;
    }
}