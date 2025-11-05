<?php

require_once __DIR__ . '/../models/mainModel.php';
$menus = getMenus();
$socials = getSocials();
$categories = getCategories();
$news = getLastNews();
$banner = getBannerNews();

if (!empty($_GET) && !empty($_GET['controller'])) {
    $controller = $_GET['controller'];

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



//    $news = getLastNews();   // agar shu massivdagi elementlar kerak bo'lsa


    require_once __DIR__ . '/../views/index.php';

}