<?php
require_once '../vendor/twig/twig/lib/Twig/Autoloader.php';
Twig_Autoloader::register();

// подключение к бд
try {
    $dbh = new PDO('mysql:dbname=php_2;host=localhost', 'root', 'root');
} catch (PDOException $e) {
    echo "Error: Could not connect. " . $e->getMessage();
}

// установка error режима
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// выполняем запрос
try {
    // формируем SELECT запрос
    // в результате каждая строка таблицы будет объектом
    $sql = "select * from img";
    $sth = $dbh->query($sql);
    while ($row = $sth->fetchObject()) {
        $data[] = $row;
    }
    // закрываем соединение
    unset($dbh);

    $loader = new Twig_Loader_Filesystem('template');

    $twig = new Twig_Environment($loader);

    $template = $twig->loadTemplate('2.tpl');

    echo $template->render(array (
        'data' => $data
    ));

} catch (Exception $e) {
    die ('ERROR: ' . $e->getMessage());
}
?>
