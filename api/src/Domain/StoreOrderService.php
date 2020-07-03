<?php

namespace Trial\CoffeeMachine\Domain;

use Trial\CoffeeMachine\Model\Orders\Orders;
use Trial\CoffeeMachine\Model\Orders\OrdersRepository;

/**
 * Class StoreOrderService
 * @package Trial\CoffeeMachine\Domain
 */
class StoreOrderService
{
    /** @var OrdersRepository */
    private $orderRepository;

    /** @var DrinkFactory */
    private $drinkFactory;

    /** @var int */
    private $status = 400;

    /**
     * StoreOrderService constructor.
     * @param OrdersRepository $orderRepository
     * @param DrinkFactory $drinkFactory
     */
    public function __construct(OrdersRepository $orderRepository, DrinkFactory $drinkFactory)
    {
        $this->orderRepository = $orderRepository;
        $this->drinkFactory = $drinkFactory;
    }

    /**
     * @param $drinkType
     * @param $money
     * @param $sugars
     * @param $extraHot
     * @return string
     */
    public function storeOrder($drinkType, $money, $sugars, $extraHot)
    {
        $isCorrectDrinkType = $this->drinkFactory->isCorrectDrinkType($drinkType);
        if($isCorrectDrinkType === true)
        {
            $orderDrink = $this->drinkFactory->decorateWithSugar($this->drinkFactory->decorateExtraHot($this->drinkFactory->createDrink($drinkType, $money), $extraHot), $sugars);
            $this->createAndSaveOrder($drinkType, $sugars, $extraHot);
            return $this->setStatusAndGetOrderMessage($orderDrink);
        }

        return $isCorrectDrinkType;
    }

    /**
     * @param $orderDrink
     * @return string
     */
    private function setStatusAndGetOrderMessage(DrinkInterface $orderDrink)
    {
        $message = $orderDrink->getMessage();
        $this->setStatus($orderDrink->getStatus());
        return $message;
    }

    /**
     * @param $drinkType
     * @param $sugars
     * @param $extraHot
     */
    private function createAndSaveOrder($drinkType, $sugars, $extraHot)
    {
        $order = Orders::create($drinkType, $sugars, $extraHot);
        $this->orderRepository->storeOrder($order);
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }


}