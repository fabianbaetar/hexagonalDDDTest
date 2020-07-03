<?php

namespace Trial\CoffeeMachine\Domain;

/**
 * Class DrinkFactory
 * @package Trial\CoffeeMachine\Domain
 */
class DrinkFactory
{
    /** @var string[] */
    private $drinkTypes = ['tea', 'coffee', 'chocolate'];

    /**
     * @param $drinkType
     * @param $money
     * @return DrinkInterface
     */
    public function createDrink($drinkType, $money)
    {
        switch ($drinkType) {
            case 'tea':
                return new Tea($money);
                break;
            case 'coffee':
                return new Coffee($money);
                break;
            case 'chocolate':
                return new Chocolate($money);
                break;
        }
    }

    /**
     * @param $drinkType
     * @return bool|string
     */
    public function isCorrectDrinkType($drinkType)
    {
        if(!in_array($drinkType, $this->drinkTypes))
        {
            return 'The drink type should be tea, coffee or chocolate.';
        }
        return true;
    }

    /**
     * @param DrinkInterface $drink
     * @param int $sugar
     * @return DrinkInterface
     */
    public function decorateWithSugar(DrinkInterface $drink, $sugar)
    {
        return new WithSugar($drink, $sugar);
    }

    /**
     * @param DrinkInterface $drink
     * @param int $extraHot
     * @return DrinkInterface
     */
    public function decorateExtraHot(DrinkInterface $drink, $extraHot)
    {
        return new ExtraHot($drink, $extraHot);
    }
}