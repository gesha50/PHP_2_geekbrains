<?php

class CatalogController extends Controller
{
    public $view = 'test';
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

}


//site.ru/index.php?path=Test/delete/10