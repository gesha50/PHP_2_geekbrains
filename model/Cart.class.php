<?php


class Cart
{

    public function __construct($action, $params)
    {
        $this->$action($params);
    }

    public function index ($params){

        //пример
       echo $params[0];
    }

}



