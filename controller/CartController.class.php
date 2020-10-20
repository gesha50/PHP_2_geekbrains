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
        $isAjax = (boolean)$_GET['isAjax'];
        if ($isAjax) {
            $_GET['asAjax'] = true;
        }
        $obj = new Cart();
        return $obj->getGoods();
    }

    public function increment ($a){
        $_GET['asAjax'] = true;
        $id = (int)$_GET['params'];
        $obj = new Cart();
        return $obj->increment($id);
    }

    public function decrement ($a){
        $_GET['asAjax'] = true;
        $id = (int)$_GET['params'];
        $counter = (int)$_GET['count'];
        $obj = new Cart();
        if ($counter == 1) {
            return $obj->delete($id);
        }
        return $obj->decrement($id);
    }



}