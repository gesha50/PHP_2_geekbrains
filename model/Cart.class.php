<?php

//require_once '../lib/db.class.php';

class Cart
{
    public $id_user;
    public $counter;

    public function __construct()
    {
        $this->id_user = $_SESSION['id_user'];
    }

    public function getGoods () {
        $res[0] = db::getInstance()->Select("SELECT id_catalog, title, price, counter,img FROM basket INNER JOIN catalog on basket.id_catalog = catalog.catalog_id WHERE id_user = :id_user ", ['id_user' => $this->id_user]);
        $res[1] = db::getInstance()->Select('SELECT sum(price*counter) as total FROM basket INNER JOIN catalog on basket.id_catalog = catalog.catalog_id WHERE id_user = :id_user', ['id_user' => $this->id_user]);
        return $res;
    }

    public function add ($id){
        $isItemInCart = $this->isItemInCart($id);
        if($isItemInCart){
            $res =  db::getInstance()->Update('update basket set counter=counter+1 where id_catalog= :id_catalog',['id_catalog'=> $id ]);   //увеличиваем counter
        } else {
            $res =  db::getInstance()->Insert('insert into basket (id_catalog, id_user, counter)
        values ( :id_catalog , :id_user, 1)', ['id_catalog' => $id, 'id_user' => $this->id_user]);
        }
    }

    public function quantity (){
        $res = db::getInstance()->Select(
            'SELECT count(*) as counter FROM basket WHERE id_user = :id_user', ['id_user' => $_SESSION['id_user']]);
        if ($res[0]['counter'] == 0){
            return "";
        }
        return $res[0]['counter'];
    }

    public function isItemInCart ($id) {
        $res = db::getInstance()->Select('SELECT id_catalog FROM basket');
        foreach ($res as $item) {
            if($item['id_catalog'] == $id){
                return  true;
            }
        }
        return false;
    }

    public function increment ($id) {
        $res = db::getInstance()->Update('update basket set counter=counter+1
                                                where id_catalog = :id_catalog',['id_catalog'=> $id ]);
        $res2 = db::getInstance()->Select('select counter from basket where id_catalog = :id_catalog',['id_catalog'=> $id ]);
        return $res2;
    }

    public function delete ($id) {
        $res = db::getInstance()->Delete('delete from basket where id_catalog = :id_catalog',['id_catalog'=> $id ]);
        return $res;
    }

    public function decrement ($id) {
        $res = db::getInstance()->Update('update basket set counter=counter-1
                                                where id_catalog = :id_catalog',['id_catalog'=> $id ]);
        $res2 = db::getInstance()->Select('select counter from basket where id_catalog = :id_catalog',['id_catalog'=> $id ]);
        return $res2;
    }

}



