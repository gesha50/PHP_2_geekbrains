<?php


class CartController extends Controller
{
    public $view = 'cart';
    public $title;

    public function __construct()
    {
        parent::__construct();
        $this->title = 'Корзина';
    }

    public function index ($id) {
        $obj = new Cart();
        return $obj->getGoods();
    }

}