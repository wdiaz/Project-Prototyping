<?php
/**
 * Created by PhpStorm.
 * User: wdiaz
 * Date: 11/26/17
 * Time: 3:52 PM
 */

namespace App\Acme;

class SelfShuntTestChild extends SelfShunt
{
    /** Rather than calling the database, we replace the method in a child class
     * and return a plain integer value
     *
     * @return int
     */
    protected function getThreshold() : int
    {
        return 10;
    }
}
