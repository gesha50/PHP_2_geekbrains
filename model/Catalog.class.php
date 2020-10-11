<?php
class Catalog {

    function getGoods(){

         return db::getInstance()->Select(
             'SELECT * FROM catalog');
    }

    public function getOneGood ($id) {
        return db::getInstance()->Select(
            'SELECT * FROM catalog where catalog_id = :catalog_id',
            ['catalog_id' => $id]);
    }
}