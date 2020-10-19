<?php

class Catalog {

    public function __construct()
    {

    }

    function getGoods(){
         $res = db::getInstance()->Select('SELECT * FROM catalog');
         return $res;
    }

    public function getOneGood ($id) {
        $res = db::getInstance()->Select(
            'SELECT * FROM catalog where catalog_id = :catalog_id',
            ['catalog_id' => $id]);
        return $res;
    }
}