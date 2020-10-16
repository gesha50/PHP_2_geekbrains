<?php

require_once '../lib/db.class.php';

class Cart extends Model
{

    public function __construct()
    {
        //$this->$action($params);
    }

    public function add ($id){
        $isItemInCart = $this->isItemInCart($id);
        echo $isItemInCart;
        if($isItemInCart){
            $res =  db::getInstance()->Insert('update basket set counter=counter+1 where id_catalog= :id_catalog',['id_catalog'=> $id ]);   //увеличиваем counter
        } else {
            $res =  db::getInstance()->Update('insert into basket (id_catalog, id_user, counter)
                                                    values ( :id_catalog ,3,5)', ['id_catalog' => $id]);
        }
        $res2 = $this->getCounter();
    }

    public function getCounter (){
        $res = db::getInstance()->Select(
            'SELECT count(*) as counter FROM basket');
        echo json_encode($res);
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

}



