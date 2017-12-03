<?php


namespace App\Acme\PriceStrategy;


class Order
{
    private $items;

    public function __construct()
    {

    }

    public function add($item)
    {
        $this->items[] = $item;
    }

    public function getTotal()
    {
        $total = 0.0;
        foreach($this->items as $item)
        {
            $total+=$item->getPrice();
        }
        return $total;
    }
}