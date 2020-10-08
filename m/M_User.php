<?php
define('DB_DRIVER', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'php_2');
define('DB_USER', 'root');
define('DB_PASS', 'root');

class M_User {
    private static $db;
    private $connect_str = DB_DRIVER . ':host=' . DB_HOST . ';dbname=' . DB_NAME;

    public function __construct()
    {
        //self::$db=DB::getObject();
        self::$db =  new PDO($this->connect_str,DB_USER,DB_PASS);
    }

    public function reg($login,$pass,$email){

        $sql = self::$db->prepare("insert into users (login, mail, pass) value (:login, :mail, :pass)");
        $sql->bindValue(':login',$login, PDO::PARAM_STR);
        $sql->bindValue(':mail', $email, PDO::PARAM_STR);
        $sql->bindValue(':pass', $pass, PDO::PARAM_STR);
        $sql->execute();
        $res = $sql->fetchAll(PDO::FETCH_ASSOC);
        return true;
    }

    public function getAll ($table) {
        $sql = self::$db->prepare("select * from {$table}");
        $sql->execute();
        $res = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }
}