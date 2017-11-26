<?php
/**
 * Created by PhpStorm.
 * User: wdiaz
 * Date: 11/26/17
 * Time: 3:36 PM
 */

namespace App\Acme\Exception;

use App\Acme\SelfShuntTestChild;
use PHPUnit\Framework\TestCase;

class SelfShuntTest extends TestCase
{
    public function testIfTemperatureIsSuperHot()
    {
        $this->assertTrue(
        //(Temperature::take(100))->isSuperHot() normally you would call this method but the trick is the one below
            (SelfShuntTestChild::take(100))->isSuperHot()
        );
    }
}
