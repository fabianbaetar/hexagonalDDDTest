<?php

namespace Trial\CoffeeMachine\Tests\Integration;

use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Trial\CoffeeMachine\Infrastructure\MysqlPdoClient;

class IntegrationTestCase extends TestCase
{

    protected $pdo;

    protected $app;

    protected function setUp()
    {
        parent::setUp();

        $this->app = $this->createApplication();

        $this->pdo = MysqlPdoClient::getPdo();
        $this->pdo->beginTransaction();
    }

    protected function tearDown()
    {
        $this->pdo->rollBack();
        unset($this->pdo);

        parent::tearDown();
    }

    /**
     * Creates the application.
     *
     * @return HttpKernelInterface
     */
    public function createApplication()
    {
        return require __DIR__ . "/../../src/app.php";
    }

    protected function handleRequest(Request $request)
    {
        $response = $this->app->handle($request);
        $this->app->terminate($request, $response);

        return $response;
    }
}
