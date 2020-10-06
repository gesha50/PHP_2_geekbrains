<?php

define('DB_DRIVER', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'php_2');
define('DB_USER', 'root');
define('DB_PASS', 'root');


class DB
{
    private $connect_str = DB_DRIVER . ':host=' . DB_HOST . ';dbname=' . DB_NAME;
    static protected $db;

    private function __construct()
    {
        self::$db = new PDO($this->connect_str,DB_USER,DB_PASS);
    }
    public static function getObject (){
        if (self::$db === null){
            self::$db = new self();
        }
        return self::$db;
    }
}