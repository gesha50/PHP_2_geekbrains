<?php

include 'abstract.php';

class PieceGoods extends Goods
{

    function __construct($price)
    {
        parent::__construct($price);
        $this->getPrice();
    }

    public function getPrice()
    {
        echo $this->price;
    }
}

$obj = new PieceGoods(1000);