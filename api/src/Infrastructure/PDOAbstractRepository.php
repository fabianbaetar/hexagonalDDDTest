<?php

namespace Trial\CoffeeMachine\Infrastructure;

/**
 * Class PDOAbstractRepository
 * @package Trial\CoffeeMachine\Infrastructure
 */
abstract class PDOAbstractRepository
{
    private $pdoClient;

    /**
     * PDOAbstractRepository constructor.
     */
    public function __construct()
    {
        $this->pdoClient = MysqlPdoClient::getPdo();
    }

    /**
     * @param $prepareStatement
     * @param $executeParams
     */
    protected function prepareAndExecuteStatement($prepareStatement, $executeParams)
    {
        $statement = $this->pdoClient->prepare($prepareStatement);
        $statement->execute($executeParams);
    }
}