<?php

namespace Trial\CoffeeMachine\Domain;

/**
 * Class ExtraHot
 * @package Trial\CoffeeMachine\Domain
 */
class ExtraHot extends DrinkDecorator
{
    /** @var int */
    private $extraHot;

    /**
     * ExtraHot constructor.
     * @param DrinkInterface $drink
     * @param int $extraHot
     */
    public function __construct(DrinkInterface $drink, $extraHot)
    {
        $this->extraHot = $extraHot;
        parent::__construct($drink);
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        $message = $this->drink->getMessage();
        if($this->extraHot == 1 && $this->drink->getStatus() === 200)
        {
            return $message . $this->getExtraHotMessage();
        }

        return $message;
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
    private function getExtraHotMessage()
    {
        return ' extra hot';
    }
}