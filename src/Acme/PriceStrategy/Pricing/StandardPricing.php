<?php


namespace App\Acme\PriceStrategy\Pricing;


use App\Acme\PriceStrategy\Item;

class StandardPricing implements PricingStrategyInterface
{
    const STRATEGY = 'standard';

    private $factor = 1.20;   // 20%

    private $item;

    public function __construct(){}

    public function from(Item $item)
    {
        $this->item = $item;
        return $this;
    }
    public function getFinalPrice()
    {
        return $this->calculateWithFactor($this->item->getCost(), $this->factor);
    }

    private function calculateWithFactor($cost, $factor)
    {
        return $cost*$factor;
    }
}