<?php

namespace Trial\CoffeeMachine\Model\Orders;

/**
 * Class Orders
 * @package Trial\CoffeeMachine\Model\Orders
 */
class Orders
{
    /** @var string */
    private $drinkType;

    /** @var int */
    private $sugars;

    /** @var int */
    private $stick;

    /** @var int */
    private $extraHot;

    /**
     * Orders constructor.
     * @param $drinkType
     * @param $sugars
     * @param $extraHot
     */
    public function __construct($drinkType, $sugars, $extraHot)
    {
        $this->drinkType = $drinkType;
        $this->sugars = $sugars;
        $this->extraHot = $extraHot;
        $this->stick = $this->needStick($sugars);
    }

    /**
     * @param $drinkType
     * @param $sugars
     * @param $extraHot
     * @return Orders
     */
    public static function create($drinkType, $sugars, $extraHot)
    {
        return new self($drinkType, $sugars, $extraHot);
    }

    /**
     * @param $sugars
     * @return int
     */
    private function needStick($sugars)
    {
        return $sugars > 0;
    }

    /**
     * @return string
     */
    public function drinkType()
    {
        return $this->drinkType;
    }

    /**
     * @return int
     */
    public function sugars()
    {
        return $this->sugars;
    }

    /**
     * @return int
     */
    public function stick()
    {
        return $this->stick;
    }

    /**
     * @return int
     */
    public function extraHot()
    {
        return $this->extraHot;
    }


}