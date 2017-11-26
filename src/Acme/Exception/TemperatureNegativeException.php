<?php

namespace App\Acme\Exception;

class TemperatureNegativeException extends \Exception
{
    public static function fromValue(int $value)
    {
        /**
         * In case you don't remember, static forces to call parent constructor
         */
        return new static(
            sprintf("Value: %d must be positive", $value)
        );
    }
}