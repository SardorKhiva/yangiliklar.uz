<?php

require_once __DIR__ . '/../models/mainModel.php';
$menus = getMenus();

if (!empty($_GET) && !empty($_GET['controller'])) {
    $controller = $_GET['controller'];
//    die($controller);

    switch ($controller) {
        case 'news_view':
        {
            require_once __DIR__ . '/../views/view.php';
            break;
        }
        case 'category':
        {

            break;
        }
    }
} else {


    $socials = getSocials();
    $news = getLastNews();

    require_once __DIR__ . '/../views/index.php';

}