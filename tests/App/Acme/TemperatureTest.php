<?php

namespace App\Acme;
use PHPUnit\Framework\TestCase;
use App\Acme\Exception\TemperatureNegativeException;
use App\Acme\Temperature;

class TemperatureTest extends TestCase
{

    /**
     *
     */
    public function testTryToCreateANonValidTemperature() : void
    {
        $this->expectException(TemperatureNegativeException::class);
        new Temperature(-1);
    }

    public function testTryToCreateAValidTemperatureTest() : void
    {
        $value = 19;
        $this->assertSame($value, (new Temperature($value))->getValue());
    }
}