<?php

class CatalogController extends Controller
{
    public $view = 'catalog';
    public $title;

    public function __construct()
    {
        parent::__construct();
        $this->title = 'Каталог';
    }

    public function index(){
        $obj = new Catalog();
        //нужно получить данные из модели и вернуть их для отображения в представлении
        return $obj->getGoods();
    }

    public function oneGood($id){
        $obj = new Catalog();
        //нужно получить данные из модели и вернуть их для отображения в представлении
        return $obj->getOneGood($id);
    }

    public function add(){
        $id = $_GET['params'];
        //$_GET['asAjax'] = true;
        $odj = new Cart;
        $odj->add($id);
    }

    public function quantity(){
        $_GET['asAjax'] = true;
        Cart::quantity();
    }

}


//site.ru/index.php?path=Test/delete/10