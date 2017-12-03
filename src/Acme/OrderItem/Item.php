<?php


namespace App\Acme\OrderItem;
use App\Acme\OrderItem\Pricing\PricingStrategyInterface;

class Item
{
    private $product;

    private $quantity;

    private $strategy;


    public function __construct(Product $product, $quantity = 1, PricingStrategyInterface $strategy)
    {
        $this->product = $product;
        $this->strategy = $strategy;
        $this->quantity = $quantity;
    }

    public function getPrice()
    {
        return $this->strategy->from($this)->getFinalPrice();
    }

    public function getSubTotal()
    {
        return $this->quantity * $this->strategy->from($this)->getFinalPrice();
    }
    public function getSellingPrice()
    {
        return $this->product->getPrice();
    }
    public function getCost()
    {
        return $this->product->getCost();
    }

    public function getProduct()
    {
        return $this->product;
    }

}