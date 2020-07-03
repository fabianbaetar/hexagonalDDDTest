<?php

namespace Trial\CoffeeMachine\Tests\Integration;

use Symfony\Component\HttpFoundation\Request;

class CoffeeMachineTest extends IntegrationTestCase
{

    public function testHelloWorld()
    {
        $request = Request::create("/", "GET");
        $response = $this->handleRequest($request);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals("I am a coffee-machine! Order me!!", $response->getContent());
    }


    /**
     * @param string $drinkType
     * @param string $money
     * @param int $sugars
     * @param string $extraHot
     * @param string $expectedResponse
     * @param int $expectedStatusCode
     *
     * @dataProvider ordersProvider
     */
    public function testPostOrder(
        string $drinkType,
        string $money,
        int $sugars,
        string $extraHot,
        string $expectedResponse,
        int $expectedStatusCode
    ) {
        $request = Request::create("/orders", "POST", [
            "drinkType" => $drinkType,
            "money" => $money,
            "sugars" => $sugars,
            "extraHot" => $extraHot,
        ]);
        $response = $this->handleRequest($request);

        $this->assertEquals($expectedStatusCode, $response->getStatusCode());
        $this->assertEquals($expectedResponse, json_decode($response->getContent())->message);
    }

    /**
     * @param string $drinkType
     * @param string $money
     * @param int $sugars
     * @param string $extraHot
     * @param string $expectedResponse
     * @param int $expectedStatusCode
     *
     * @dataProvider ordersProvider
     */
    public function testPostOrderJson(
        string $drinkType,
        string $money,
        int $sugars,
        string $extraHot,
        string $expectedResponse,
        int $expectedStatusCode
    ) {
        $request = Request::create("/orders", "POST", [], [], [], [],  json_encode([
            "drinkType" => $drinkType,
            "money" => $money,
            "sugars" => $sugars,
            "extraHot" => $extraHot,
        ]));
        $request->headers->set('Content-Type', 'application/json');
        $response = $this->handleRequest($request);

        $this->assertEquals($expectedStatusCode, $response->getStatusCode());
        $this->assertEquals($expectedResponse, json_decode($response->getContent())->message);
    }

    public function ordersProvider(): array
    {
        return [
            ['chocolate', '0.7', 1, '', 'You have ordered a chocolate with 1 sugars (stick included)', 200],
            ['tea', '0.4', 0, 1, 'You have ordered a tea extra hot',200],
            ['coffee', '2', 2, 1, 'You have ordered a coffee extra hot with 2 sugars (stick included)', 200],
            ['coffee', '0.2', 2, 1, 'The coffee costs 0.5.', 400],
            ['chocolate', '0.3', 2, 1, 'The chocolate costs 0.6.', 400],
            ['tea', '0.1', 2, 1, 'The tea costs 0.4.', 400],
            ['tea', '0.5', -1, 1, 'The number of sugars should be between 0 and 2.', 400],
            ['tea', '0.5', 3, 1, 'The number of sugars should be between 0 and 2.', 400],
        ];
    }

}