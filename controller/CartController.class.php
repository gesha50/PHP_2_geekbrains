<?php


class CartController extends Controller
{
    public $view = 'cart';
    public $title;

    public function __construct()
    {
        parent::__construct();
    }

    public function add () {
        $id = $_GET['params'];
        //$_GET['asAjax'] = true;
        $odj = new Cart;
        $odj->add($id);
    }

}