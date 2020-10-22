<?php


class Admin
{
    public function __construct()
    {
    }

    public function isAdmin()
    {
        if (isset($_SESSION['admin'])) {
            return true;
        }
        return false;
    }

    public function getItem ($id){
        $res = db::getInstance()->Select('select * from catalog where catalog_id= :catalog_id', ['catalog_id'=>$id]);
        return $res;
    }

    public function itemUpdate ( $id, $name, $desc, $price) {
        $res = db::getInstance()->Update('update catalog set title= :title, price= :price, `desc` = :desc where catalog_id= :catalog_id',[
            'title' => $name,
            'price' => $price,
            'desc' => $desc,
            'catalog_id' =>$id
        ]);
    }

    public function newItem ( $name, $desc, $price) {
        $res = db::getInstance()->Insert('INSERT INTO catalog (title, price, `desc`) value (:title, :price, :desc)',[
            'title' => $name,
            'price' => $price,
            'desc' => $desc
        ]);
    }

    public function getOrders (){
        $res = db::getInstance()->Select('SELECT * FROM `Orderer` ORDER BY id DESC');
        return $res;
    }

    public function getPopupOrder ($id){
        $res = db::getInstance()->Select('SELECT title, counter, price from orderToManager 
inner JOIN catalog ON id_good = catalog_id
WHERE order_id = :order_id', ['order_id'=>$id]);
        return $res;
    }



}