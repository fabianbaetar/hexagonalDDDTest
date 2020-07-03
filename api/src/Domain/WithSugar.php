<?php

namespace Trial\CoffeeMachine\Domain;

/**
 * Class WithSugar
 * @package Trial\CoffeeMachine\Domain
 */
class WithSugar extends DrinkDecorator
{
    /** @var int */
    private $sugar;

    /**+
     * WithSugar constructor.
     * @param DrinkInterface $drink
     * @param int $sugar
     */
    public function __construct(DrinkInterface $drink, $sugar)
    {
        $this->sugar = $sugar;
        parent::__construct($drink);
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        if($this->sugar >= 0 && $this->sugar < 3)
        {
            $message = $this->drink->getMessage();
            if($this->sugar > 0 && $this->drink->getStatus() === 200)
            {
                return $message . $this->getSugarMessage();
            }
            return $message;
        }

        $this->drink->setStatus(400);
        return 'The number of sugars should be between 0 and 2.';
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->drink->getStatus();
    }

    /**
     * @param $status
     */
    public function setStatus($status)
    {
        return $this->drink->setStatus($status);
    }

    /**
     * @return string
     */
    private function getSugarMessage()
    {
        return ' with '.$this->sugar.' sugars (stick included)';
    }
}