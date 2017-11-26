<?php
namespace App\Acme;

use App\Acme\Exception\TemperatureNegativeException;

class SelfShunt
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
        return new static($value);
    }


    /**
     * @return bool
     */
    public function isSuperHot() : bool
    {
        $threshold = $this->getThreshold();
        return $this->getValue() > $threshold;
    }

    /** This method has been placed on purpose. The idea here is to circumvent
     * expensive database calls when testing. Let's pretend this method cannot be removed yet we do have to test it.
     * The Self shunt strategy is to create a child class and overwrite the expensive method
     *
     * @return int
     */
    protected function getThreshold(): int
    {
        $conn = \Doctrine\DBAL\DriverManager::getConnection([
            'dbname' => 'dbname',
            'user' => 'user',
            'password' => 'password',
            'host' => 'localhost',
            'driver' => 'driver'
        ]);
        return $conn->fetchCol("select threshold from configuration");
    }
}