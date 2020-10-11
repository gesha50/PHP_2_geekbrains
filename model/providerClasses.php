<?php
require_once '../autoload.php';

$params = $_POST['params'];
$class = $_POST['class'];
$action = $_POST['action'];


$obj = new $class($action,$params);
//$obj->$action($params);



