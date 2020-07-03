<?php

namespace Trial\CoffeeMachine\Model\Orders;

/**
 * Interface OrdersRepository
 * @package Trial\CoffeeMachine\Model\Orders
 */
interface OrdersRepository
{
    /**
     * @param Orders $order
     */
    public function storeOrder(Orders $order);
}