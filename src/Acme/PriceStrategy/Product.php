<?php


namespace App\Acme\PriceStrategy;

class Product
{
    private $name;
    private $price;
    private $cost;
    public function __construct($name, $price, $cost = 0)
    {
        $this->name = $name;
        $this->price = $price;
        $this->cost = $cost;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getCost()
    {
        return $this->cost;
    }
}