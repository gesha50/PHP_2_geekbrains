<?php

include 'traitTest.php';

class Home2
{

    protected static $_instance;

    private function __construct()
    {
    }

    // используем trait
    use doGetInstance;

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }
    private function __wakeup()
    {
        // TODO: Implement __wakeup() method.
    }
    public function select(){
        echo "Работает!";
    }
}

// создаем класс Test для проверки, что всё работает
class Test {
    private static $_instance;

    public function __construct()
    {
        self::$_instance = Home2::getInstance();
    }

    public function getGoods (){
        $goods = self::$_instance->select();
    }
}

$obj = new Test;
$obj->getGoods();
