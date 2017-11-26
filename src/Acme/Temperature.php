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
class Temperature
{
    private $value;

    /**
     * Temperature constructor.
     * @param $value
     */
    public function __construct($value)
    {
        /*
         * The following method is called "Guard Clause" because it encapsulates validation within
         * the a function
        */
        $this->checkValueIsPositive($value);
        $this->value = $value;
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
    protected function checkValueIsPositive($value): void
    {
        if ($value < 0) {
            throw new TemperatureNegativeException();
        }
    }


}