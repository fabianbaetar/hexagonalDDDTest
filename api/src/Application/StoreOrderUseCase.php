<?php

namespace Trial\CoffeeMachine\Application;

use Trial\CoffeeMachine\Domain\StoreOrderService;
use Trial\CoffeeMachine\Infrastructure\ResponseAdapter;

/**
 * Class StoreOrderUseCase
 * @package Trial\CoffeeMachine\Application+
 */
class StoreOrderUseCase
{
    /** @var StoreOrderService */
    private $storeOrderService;

    /** @var ResponseAdapter */
    private $responseAdapter;

    /**
     * StoreOrderUseCase constructor.
     * @param StoreOrderService $storeOrderService
     * @param ResponseAdapter $responseAdapter
     */
    public function __construct(StoreOrderService $storeOrderService, ResponseAdapter $responseAdapter)
    {
        $this->storeOrderService = $storeOrderService;
        $this->responseAdapter = $responseAdapter;
    }

    /**
     * @param StoreOrderRequest $request
     * @return mixed
     */
    public function storeOrder(StoreOrderRequest $request)
    {
        $message = $this->storeOrderService->storeOrder($request->getDrinkType(), $request->getMoney(), $request->getSugars(), $request->getExtraHot());
        $status = $this->storeOrderService->getStatus();
        $this->responseAdapter->createResponse($message, $status);
        return $this->responseAdapter->getResponse();
    }
}
