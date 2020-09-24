<?php



abstract class Goods
{
    protected $price;

    function __construct($price)
    {
        $this->price = $price;
    }

    abstract function getPrice ();

}