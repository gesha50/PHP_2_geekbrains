<?php

// тестировал различные встроенные методы

class MyClass {
    public $c = "srabotalo";

    public function __call($name, $arguments) {
        for ($i=0; $i<count($arguments); $i++) {
            echo "аргумент " . $i . ": " . $arguments[$i] . "<br>";
        }
        return "__call, method - {$name} is not exists \n";
    }

    public function __set($name, $value) {
        echo "__set, property - {$name} is not exists {$value} \n<br>";
    }

    public function __get($name) {
        echo "__get, property - {$name} is not exists \n <br>";
    }
}
$obj = new MyClass;
$obj->a = 1;    // Запись в свойство (свойство не существует)
echo $obj->b; // Получаем значение свойства (свойство не существует)
echo $obj->getName("hello",777);
