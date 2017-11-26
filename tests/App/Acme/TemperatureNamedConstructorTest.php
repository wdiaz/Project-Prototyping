<?php
/**
 * Created by PhpStorm.
 * User: wdiaz
 * Date: 11/26/17
 * Time: 3:11 PM
 */

namespace App\Acme;

use PHPUnit\Framework\TestCase;

class TemperatureNamedConstructorTest extends TestCase
{
    public function testTryToCreateAValidTemperatureWithNamedConstructor()
    {
       $value = 16;
       $this->assertSame($value,
           (TemperatureNamedConstructor::take($value))->getValue()
        );
    }

}
