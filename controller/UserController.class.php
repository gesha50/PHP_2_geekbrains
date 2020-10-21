<?php

class UserController extends Controller
{
    public $view = 'user';
    public $title;

    public function __construct()
    {
       parent::__construct();
    }

    public function reg(){
        $obj = new User();
        $isLogin = $obj->isUserLogin();
        if ($isLogin) {
            return $res = ['text' => $_SESSION['login'], 'status' =>  '1'];
        }
        if(isset($_POST['submit'])){   //если нажата кнопка зарегистрировать
            $login = trim(strip_tags($_POST['login']));
            if(strtolower($login) == 'admin'){
                exit("Логин админа нельзя зарегистрировать!");
            }
            $user = $obj->getAll();

            foreach ($user as $item) {
                if($login == $item['login']){
                    exit("Такой уже логин есть!");
                }
            }
            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $email = trim(strip_tags($_POST['email']));
            }
            $pass = trim(strip_tags($_POST['pass']));

            $obj->newUser($login, $email, md5($pass));
            return $res = ['text' => "Вы успешно зарегестрировались!", 'status' => 1];

        }
    }

    public function login(){
        $obj = new User();
        $isLogin = $obj->isUserLogin();
        if ($isLogin) {
            return $res = ['text' => $_SESSION['login'], 'status' =>  '1'];
        }
        if(isset($_POST['enter'])){
            $login = trim(strip_tags($_POST['login']));
            $pass = trim(strip_tags($_POST['pass']));

            $user = $obj->getAll();
            foreach ($user as $item) {
                if($login == $item['login'] and md5($pass) == $item['pass']){
                    $message = "Вы вошли!";
                    if ($item['admin']){
                        $_SESSION['admin'] = $item['admin'];
                    }
                    $_SESSION['login'] = $login;
                    $_SESSION['pass'] = $pass;
                    header("Location: index.php?path=user/cabinet");
                } else{
                    $message = "Не правильно ввели данные!";
                }
            }
            return $res = ['text' => $message];
        }

    }

    public function cabinet(){
        return $_SESSION['login'];
    }

    public function destroy(){
        unset($_SESSION['login']);
        unset($_SESSION['pass']);
        session_destroy();
        header('location: index.php');
    }



}