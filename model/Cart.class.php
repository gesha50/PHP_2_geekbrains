<?php


class Cart
{

    public function __construct($action, $params)
    {
        $this->$action($params);
    }

    public function index ($params){
       //$res = db::getInstance()->Insert('insert into basket (id_catalog, id_user, counter) values (1,555,3)');
        $res = db::getInstance()->Select(
            'SELECT * FROM catalog');
        return $res;
    }

//    public function getCounter ($params){
//        $res = db::getInstance()->Select(
//            'SELECT count(*) FROM basket');
//        //$isItemInBasket = false;
//
//        echo $res;
//    }

}



