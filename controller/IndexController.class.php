<?php

class IndexController extends Controller
{
    public $view = 'index';
    public $title;

    function __construct()
    {
        parent::__construct();
        $this->title .= ' | ДЕМО!!!';
    }
	
	//метод, который отправляет в представление информацию в виде переменной content_data
	function index($data){
        $res['active'] = (int)$_GET['active'];
		 return $res;
	}


}

//site/index.php?path=index/catalog/5