<?php

namespace Trial\CoffeeMachine\Infrastructure;

use Trial\CoffeeMachine\Model\Orders\Orders;
use Trial\CoffeeMachine\Model\Orders\OrdersRepository;

/**
 * Class PDOOrdersRepositoryAdapter
 * @package Trial\CoffeeMachine\Infrastructure
 */
class PDOOrdersRepositoryAdapter extends PDOAbstractRepository implements OrdersRepository
{
    /**
     * @param Orders $order
     */
    public function storeOrder(Orders $order)
    {
        $prepareStatement = $this->getPrepareStatement();
        $executeParams = $this->getExecuteParamsFromOrder($order);
        $this->prepareAndExecuteStatement($prepareStatement, $executeParams);
    }

    /**
     * @return string
     */
    private function getPrepareStatement()
    {
        return 'INSERT INTO orders (drink_type, sugars, stick, extra_hot) VALUES 
                (:drink_type, :sugars, :stick, :extra_hot)';
    }

    /**
     * @param Orders $order
     * @return array
     */
    private function getExecuteParamsFromOrder(Orders $order)
    {
        return [
            'drink_type' => $order->drinkType(),
            'sugars'     => (int) $order->sugars(),
            'stick'      => (int) $order->sugars(),
            'extra_hot'  => (int) $order->extraHot()
        ];
    }
}