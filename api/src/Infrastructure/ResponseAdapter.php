<?php

namespace Trial\CoffeeMachine\Infrastructure;

/**
 * Interface ResponseAdapter
 * @package Trial\CoffeeMachine\Infrastructure
 */
interface ResponseAdapter
{
    /**
     * @param string $message
     * @param int $status
     * @param array $headers
     */
    public function createResponse($message = '', $status = 200, $headers = []);

    /**
     * @return mixed
     */
    public function getResponse();
}