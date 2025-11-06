<?php
// yangilik sahifasiga kiradigan bo'ldi, yangilik ni sahifasiga chiqarish qoldi
declare(strict_types=1);  // tiplarni mixlash

// controllers/mainController.php

// asosiy modelni ulash orqali barcha modellarni ulash:
use JetBrains\PhpStorm\NoReturn;

require_once __DIR__ . '/../models/mainModel.php';

$menus = getMenus();            // menu dagi elementlar
$socials = getSocials();        // footer dagi ijtimoiy tarmoqlar
$categories = getCategories();  // yangiliklar kategoriyalari
$news = getLastNews();          // oxirgi 3 ta yangilik
$banner = getBannerNews();      // bannerdagi yangiliklar, standart 6 ta

if (!empty($_GET['controller'])) {
    $controller = $_GET['controller'];

    switch ($controller) {
        case 'news_view':
        {
            // nima kelsa ham get so'rovdagi id ni olish
            $_GET['id'] = htmlspecialchars($_GET['id']);
            $id = (int)($_GET['id']);

            // id larni keshlash
            static $all_ids = null;
            if ($all_ids === null) {
                $all_ids = getAllNewsIds();
            }

            if ($id <= 0 || !in_array($id, $all_ids, true)) {
                show404();
            }


            $newsItem = getNewsById($id);
            if (!$newsItem) {
                show404();
            }
            // id orqali yangilikni olish

            require_once __DIR__ . '/../views/view.php';

            break;
        }
        case
        'category':
        {

            break;
        }
        default:
        {
            show404();
            break;
        }
    }
} else {
//    $news = getLastNews();   // agar shu massivdagi elementlar kerak bo'lsa
    require_once __DIR__ . '/../views/index.php';
}

/**
 * @return void
 * @uses  http_response_code() haqiqatda mavjud sahifaga o'tilganini
 * brauzer va qidiruv tizimlariga bildiradi,
 * bo'lmasa 404.php ham boshqa sahifalardek bo'lib qoladi
 * exit() - skript ni to'xtatadi
 */
#[NoReturn]
function show404(): void
{
    http_response_code(404);
    require_once __DIR__ . '/../views/404.php';  // my favorite error page

//    require_once __DIR__ . '/../views/404_simple.php';    // simple 404 page
    exit;
}