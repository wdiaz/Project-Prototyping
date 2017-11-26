<?php
namespace App\Acme;

use App\Acme\Exception\TemperatureNegativeException;

class TemperatureNamedConstructor
{
    private $value;

    /** NOTE: Notice the private accessor in the constructor. This forces
     * the creation of an object passed through the take method only
     * Temperature constructor.
     * @param $value
     */
    private function __construct($value)
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
            throw TemperatureNegativeException::fromValue($value);
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

    /**
     * @param $value
     * @return TemperatureNamedConstructor
     */
    public static function take($value) : self
    {
        return new self($value);
    }
}