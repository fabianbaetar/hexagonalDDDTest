<?php

namespace Trial\CoffeeMachine\Infrastructure\Http\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Trial\CoffeeMachine\Application\StoreOrderRequest;
use Trial\CoffeeMachine\Application\StoreOrderUseCase;
use Trial\CoffeeMachine\Domain\DrinkFactory;
use Trial\CoffeeMachine\Domain\StoreOrderService;
use Trial\CoffeeMachine\Infrastructure\PDOOrdersRepositoryAdapter;
use Trial\CoffeeMachine\Infrastructure\ResponseSymfonyAdapter;

/**
 * Class CoffeeMachineOrderController
 * @package Trial\CoffeeMachine\Infrastructure\Http\Controllers
 */
class CoffeeMachineOrderController
{

    /**
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $storeOrderRepository = new PDOOrdersRepositoryAdapter();
        $drinkFactory = new DrinkFactory();
        $storeOrderService = new StoreOrderService($storeOrderRepository, $drinkFactory);
        $responseAdapter = new ResponseSymfonyAdapter();
        $storeOrderUseCase = new StoreOrderUseCase($storeOrderService, $responseAdapter);
        $storeOrderRequest = new StoreOrderRequest($request->get('drinkType'), $request->get('money'),
            $request->get('sugars'), $request->get('extraHot'));
        return $storeOrderUseCase->storeOrder($storeOrderRequest);
    }

}