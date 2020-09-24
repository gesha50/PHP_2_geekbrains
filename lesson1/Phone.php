<?php

include 'product.php';

class Phone extends product {

    protected $memory;
    protected $color;

    public function __construct($title, $price, $description, $memory, $color)
    {
        parent::__construct($title, $price, $description);
        $this->memory = $memory;
        $this->color = $color;
        $this->productOnPage();

    }

    protected function productOnPage()
    {
        parent::productOnPage();
        $this->good .= "Цвет: " . $this->color . "<br> Объём памяти: " . $this->memory . "GB <br>";
        echo $this->good;
    }
}

$obj = new Phone("Iphone 11", 1000, "супер пупер крутой лалалала", 256, "gray");