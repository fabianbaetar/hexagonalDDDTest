<?php

namespace Trial\CoffeeMachine\Infrastructure;

use Symfony\Component\HttpFoundation\Response;

/**
 * Class ResponseSymfonyAdapter
 * @package Trial\CoffeeMachine\Infrastructure
 */
class ResponseSymfonyAdapter implements ResponseAdapter
{
    /** @var Response */
    private $symfonyResponse;

    /**
     * @param string $message
     * @param int $status
     * @param array $headers
     */
    public function createResponse($message = '', $status = 200, $headers = ['Content-Type' => 'application/json'])
    {
        $this->symfonyResponse = new Response(json_encode(['message' => $message]), $status, $headers);
    }

    /**
     * @return Response
     */
    public function getResponse()
    {
        return $this->symfonyResponse;
    }
}