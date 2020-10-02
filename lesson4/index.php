<?php
require_once 'setting/db.php';
require_once '../vendor/twig/twig/lib/Twig/Autoloader.php';

Twig_Autoloader::register();
try {
    $loader = new Twig_Loader_Filesystem('template');

    $twig = new Twig_Environment($loader);

    $template = $twig->loadTemplate('index.tmp');

    $content = $template->render([
        'title' => "Главная",
        'goods' => $goods,
        'id'=> $id
    ]);
    echo $content;

}
catch (Exception $e){
    die ('ERROR: ' . $e->getMessage());
}