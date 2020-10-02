<?php

$id = (int)($_GET['id']) + 1;

$sql = "SELECT * FROM test WHERE test_id BETWEEN $id AND '1000000' LIMIT 2";

try {
    $db = new PDO('mysql:host=localhost; dbname=php_2','root','root');

    $result = $db->query($sql);

    if ($db->errorCode() != 0000){
        $error_array = $db->errorInfo();
        echo "SQL ошибка: " . $error_array[2] . "<br />";
    }

    $i = 0;
    while ($rows = $result->fetch()){
        $goods[$i] = [$rows['test_id'],$rows['title'],$rows['desc'],$rows['img'],$rows['price']];
        $i++;
    }
    echo json_encode($goods);
}
catch (PDOException $e){
    die("Error: " . $e->getMessage());
}

