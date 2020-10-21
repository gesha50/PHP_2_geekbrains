<?php


class User
{
    public function __construct()
    {
    }

    public function isUserLogin (){
        if(isset($_SESSION['login']) && isset($_SESSION['pass'])){
            return true;
        }
        return false;
    }

    public function getAll (){
        $res = db::getInstance()->Select('SELECT * FROM users');
        return $res;
    }

    public function newUser ($login, $email, $pass) {
        $res = db::getInstance()->Insert('INSERT INTO users (login, email, pass) VALUES (:login, :email, :pass)', [
            'login' => $login,
            'email' => $email,
            'pass' => $pass
        ]);
    }

}