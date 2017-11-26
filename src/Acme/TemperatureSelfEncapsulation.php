<?php
/**
 * Created by PhpStorm.
 * User: wdiaz
 * Date: 11/26/17
 * Time: 2:06 PM
 */

namespace App\Acme;


use App\Acme\Exception\TemperatureNegativeException;

/**
 * Class Temperature
 * @package App\Acme
 */
class TemperatureSelfEncapsulation
{
    private $value;

    /**
     * Temperature constructor.
     * @param $value
     */
    public function __construct($value)
    {
        $this->setMeasurement($value);
    }

    /**
     * @return int
     */
    public function getValue() : int
    {
        return $this->value;
    }

    /**
     * @param $value
     * @throws TemperatureNegativeException
     */
    private function checkValueIsPositive($value): void
    {
        if ($value < 0) {
            throw new TemperatureNegativeException();
        }
    }

    /**
     * @param $value
     */
    private function setMeasurement($value): void
    {
        $this->checkValueIsPositive($value);
        $this->value = $value;
    }


}