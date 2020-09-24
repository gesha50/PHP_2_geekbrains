<?php

include 'product.php';

class Accesories extends product
{

    protected $color;
    protected $type;
    protected $material;

    public function __construct($title, $price, $description, $color, $type, $material)
    {
        parent::__construct($title, $price, $description);
        $this->color = $color;
        $this->type = $type;
        $this->material = $material;
        $this->productOnPage();
    }

    protected function productOnPage()
    {
        parent::productOnPage();
        $this->good .= "Цвет: " . $this->color . "<br> Тип чехла: " . $this->type . "<br> Материал: " . $this->material;
        echo $this->good;
    }
}

$obj2 = new Accesories("Чехол для Iphone", 50, "Очень удобный", "red", "чехол-книжка", "селикон");