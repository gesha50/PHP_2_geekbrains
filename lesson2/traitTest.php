<?php

trait doGetInstance {
    static function getInstance (){
        if (self::$_instance === null){
            self::$_instance  = new self;
        }
        return self::$_instance;
    }
}