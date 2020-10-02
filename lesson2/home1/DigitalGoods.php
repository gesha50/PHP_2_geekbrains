<?php

include 'abstract.php';

class DigitalGoods extends Goods
{

    public function __construct($price)
    {
        parent::__construct($price);
        $this->getPrice();
    }

    public function getPrice()
    {
        $this->price = $this->price / 2;
        echo $this->price;
    }
}

$obj = new DigitalGoods(1000);