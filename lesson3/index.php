<?php
include 'setting/db.php';
include 'models/getImg.php';
require_once '../vendor/twig/twig/lib/Twig/Autoloader.php';
Twig_Autoloader::register();

try {
    $loader = new Twig_Loader_Filesystem('template');

    $twig = new Twig_Environment($loader);

    $template = $twig->loadTemplate('twigTemplate.tpl');

    $content = $template->render([
        'photo' => $photo
    ]);
    echo $content;

}
catch (Exception $e){
    die ('ERROR: ' . $e->getMessage());
}

