<?php


class product
{
    protected $title;
    protected $price;
    protected $description;
    public $good;

    public function __construct($title, $price, $description)
    {
        $this->title = $title;
        $this->price = $price;
        $this->description = $description;
    }

    protected function productOnPage (){
        $this->good = $this->title . " стоит " . $this->price . "$ <br> Описание: " . $this->description . "<br>";
    }
}