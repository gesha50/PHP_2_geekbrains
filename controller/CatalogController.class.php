<?php

class CatalogController extends Controller
{
    public $view = 'catalog';
    public $title;

    function __construct()
    {
        parent::__construct();
        $this->title .= ' | Тестовая страница';
    }

    function index(){
        $obj = new Catalog();
        //нужно получить данные из модели и вернуть их для отображения в представлении
        return $obj->getGoods();
    }

    function oneGood($id){
        $obj = new Catalog();
        //нужно получить данные из модели и вернуть их для отображения в представлении
        return $obj->getOneGood($id);
    }

}


//site.ru/index.php?path=Test/delete/10