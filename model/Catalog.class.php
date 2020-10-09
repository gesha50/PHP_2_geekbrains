<?php
class Catalog {
     function getGoods(){

         return db::getInstance()->Select(
             'SELECT * FROM catalog');
    }
}