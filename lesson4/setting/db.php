<?php



try {
    $db = new PDO('mysql:host=localhost; dbname=php_2','root','root');

    $result = $db->query('select * from test limit 2');

    if ($db->errorCode() != 0000){
        $error_array = $db->errorInfo();
        echo "SQL ошибка: " . $error_array[2] . "<br />";
    }

    while ($rows = $result->fetch()){
        $goods[] = [$rows['title'],$rows['desc'],$rows['img'],$rows['price']];
        $id = $rows['test_id'];
    }

}
catch (PDOException $e){
    die("Error: " . $e->getMessage());
}