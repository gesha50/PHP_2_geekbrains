<?php



try {
    $db = new PDO('mysql:host=localhost; dbname=php_2','root','root');

    $result = $db->query('select * from test limit 2');

    if ($db->errorCode() != 0000){
        $error_array = $db->errorInfo();
        echo "SQL ошибка: " . $error_array[2] . "<br />";
    }

    $i = 0;
    while ($rows = $result->fetch()){
        $goods[$i] = [$rows['title'],$rows['desc'],$rows['img'],$rows['price']];
        $i++;
        $id = $rows['test_id'];
    }

}
catch (PDOException $e){
    die("Error: " . $e->getMessage());
}