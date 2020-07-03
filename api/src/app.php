<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$app = new Application();

$app['debug'] = true;

$app->before(function (Request $request) {
    if (0 === strpos($request->headers->get('Content-Type'), 'application/json')) {
        $data = json_decode($request->getContent(), true);
        $request->request->replace(is_array($data) ? $data : array());
    }
});

$app->after(function (Request $request, Response $response) {
    $response->headers->set('Access-Control-Allow-Origin', '*');
    $response->headers->set('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, HEA');
    $response->headers->set('Access-Control-Allow-Headers', 'Authorization, Origin, X-Requested-With, Content-Type, Accept');
});

$app->options("{anything}", function () {
    return new JsonResponse(null, 204);
})->assert("anything", ".*");

$app->get('/', function (Request $request) use ($app) {
    return new Response('I am a coffee-machine! Order me!!');
});
$app->post('/orders', "\Trial\CoffeeMachine\Infrastructure\Http\Controllers\CoffeeMachineOrderController::store");

return $app;
