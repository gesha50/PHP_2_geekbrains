<?php
const SERVER = 'localhost';
const DB = 'php_2';
const LOGIN = 'root';
const PASS = 'root';

$connect = mysqli_connect(SERVER,LOGIN,PASS,DB) or die("Error: ".mysqli_error($connect));
if(!mysqli_set_charset($connect, "utf8")){
    printf("Error: ".mysqli_error($connect));
}


?>
