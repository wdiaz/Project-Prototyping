<?php
declare(strict_types=1);

use App\Acme\PriceStrategy\Item;
use App\Acme\PriceStrategy\Order;
use App\Acme\PriceStrategy\Pricing\StandardPricing;
use App\Acme\PriceStrategy\Product;
use PHPUnit\Framework\TestCase;


final class ProductTest extends TestCase
{
    public function testProduct()
    {
        $order = new Order();
        $order->add(new Item(new Product('Pants', 25.25, 20.25), 4, new StandardPricing()));
        $total = $order->getTotal();
        $this->assertEquals(24.30, $total);
    }


    /*public function testWithProductPriceOverride()
    {
        $order = new Order();
        $order->add(new Item(new Product('Pants', 25.25, 20.25), 4, new StandardPricing()));
        $total = $order->getTotal();
        $this->assertEquals(24.30, $total);
    }*/
}
