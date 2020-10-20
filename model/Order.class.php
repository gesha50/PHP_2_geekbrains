<?php

class Order {

    public $order_id;

    public function __construct($delivery,$name,$phone,$persons,$pay,$desiredTime,$money,$address,$comment)
    {
        $this->insertInOrder($delivery,$name,$phone,$persons,$pay,$desiredTime,$money,$address,$comment);
        $this->order_id = $this->numberOrder();
    }

    public function insertInOrder ($delivery,$name,$phone,$persons,$pay,$desiredTime,$money,$address,$comment) {
        $res = db::getInstance()->Insert('INSERT INTO Orderer (delivery, name, telefon, person, money, date_time, `change`, adress, `comment`)
         VALUES (:delivery, :name, :phone, :person, :money, :date_time, :cash, :address, :com)',
            [
                'delivery'=>$delivery,
                'name'=>$name,
                'phone'=>$phone,
                'person'=>$persons,
                'money'=>$pay,
                'date_time'=> $desiredTime,
                'cash'=>$money,
                'address'=>$address,
                'com'=>$comment
            ]);
        return true;
    }

    public function copyToManager () {
        $res = db::getInstance()->Select('select * from basket where id_user = :id_user', ['id_user'=>$_SESSION['id_user']]);
        for ($i=0;$i < count($res);$i++){
            $sql = db::getInstance()->Insert("insert into orderToManager (id_good, `counter`,id_user, order_id) 
                                                    values ( :id_good , :counter , :id_user , :order_id )", [
                                                        'id_good'=>$res[$i]['id_catalog'],
                                                        'counter'=>$res[$i]['counter'],
                                                        'id_user'=>$_SESSION['id_user'],
                                                        'order_id'=>$this->order_id
            ]);
        }
    }

    public function deleteFromCart () {
        $res = db::getInstance()->Delete('delete from basket where id_user = :id_user', ['id_user'=>$_SESSION['id_user']]);
    }

    public function numberOrder () {
        $res = db::getInstance()->Select('Select max(`id`) as maxid from Orderer');
        return $res[0]['maxid'];

    }



}