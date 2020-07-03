<?php

namespace Trial\CoffeeMachine\Application;

/**
 * Class StoreOrderRequest
 * @package Trial\CoffeeMachine\Application
 */
class StoreOrderRequest
{
    private $drinkType;
    private $money;
    private $sugars;
    private $extraHot;

    /**
     * StoreOrderRequest constructor.
     * @param $requestDrinkType
     * @param $requestMoney
     * @param $requestSugars
     * @param $requestExtraHot
     */
    public function __construct($requestDrinkType, $requestMoney, $requestSugars, $requestExtraHot)
    {
        $this->drinkType    = $requestDrinkType;
        $this->money        = $requestMoney;
        $this->sugars       = $requestSugars;
        $this->extraHot     = $requestExtraHot;
    }

    /**
     * @return mixed
     */
    public function getDrinkType()
    {
        return $this->drinkType;
    }

    /**
     * @return mixed
     */
    public function getMoney()
    {
        return $this->money;
    }

    /**
     * @return mixed
     */
    public function getSugars()
    {
        return $this->sugars;
    }

    /**
     * @return mixed
     */
    public function getExtraHot()
    {
        return $this->extraHot;
    }

}