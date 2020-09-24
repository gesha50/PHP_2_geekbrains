<?php

include 'abstract.php';

class WeightGoods extends Goods
{
    // вес будет в граммах
    protected $weight;

    public function __construct($price, $weight)
    {
        $this->weight = $weight / 1000;
        parent::__construct($price);
        $this->getPrice();
    }

    public function getPrice()
    {
        $this->price = $this->price * $this->weight;
        echo $this->price;
    }
}
// цена 400 руб за кг получается
$obj = new WeightGoods(400, 250);