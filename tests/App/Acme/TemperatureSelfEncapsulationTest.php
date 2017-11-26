<?php
/**
 * Created by PhpStorm.
 * User: wdiaz
 * Date: 11/26/17
 * Time: 3:02 PM
 */

namespace App\Acme;

use PHPUnit\Framework\TestCase;
use App\Acme\Exception\TemperatureNegativeException;

class TemperatureSelfEncapsulationTest extends TestCase
{
    public function testTryToCreateANonValidTemperature() : void
    {
        $this->expectException(TemperatureNegativeException::class);
        new TemperatureSelfEncapsulation(-1);
    }

    public function testTryToCreateAValidTemperatureTest() : void
    {
        $value = 19;
        $this->assertSame($value, (new TemperatureSelfEncapsulation($value))->getValue());
    }
}
