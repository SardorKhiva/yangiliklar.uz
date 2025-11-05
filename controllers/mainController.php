<?php

require_once __DIR__ . '/../models/mainModel.php';

$menus = getMenus();            // menu dagi elementlar
$socials = getSocials();        // footer dagi ijtimoiy tarmoqlar
$categories = getCategories();  // yangiliklar kategoriyalari
$news = getLastNews();          // oxirgi 3 ta yangilik
$banner = getBannerNews();      // bannerdagi yangiliklar, standart 6 ta
//$oneNews = getNewsById();       // 1 ta yangilik olish

if (!empty($_GET) && !empty($_GET['controller'])) {
    $controller = $_GET['controller'];

    switch ($controller) {
        case 'news_view':
        {
            // nima kelsa ham get so'rovdagi id ni olish
            $id = htmlspecialchars($_GET['id']);

            // id bo'sh bo'lmasa,
            // id son bo'lsa va
            // yangiliklar jadvalida id qiymati bor bo'lsa
            if (!empty($id) && is_numeric($id) && in_array($id, $news)) {

                // id orqali yangilikni olish
                $newsItem = getNewsById($id);

                // yangilik ni debug qilish
                dd($newsItem, 0);

                // shundan keyin yangilik sahifasini ulash
                require_once __DIR__ . '/../views/view.php';    // yangilik sahifasiga kirsin

            } else {
                require_once __DIR__ . '/../views/error.php';
            }

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