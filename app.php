<?php
require_once 'autoload.php';
//require 'model/providerClasses.php';
try{
    App::init();
}
catch (PDOException $e){
    echo "DB is not available";
    var_dump($e->getTrace());
}
catch (Exception $e){
    echo $e->getMessage();
}
