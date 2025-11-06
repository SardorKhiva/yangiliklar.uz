<?php
declare(strict_types=1);  // tiplarni mixlash

// controllers/mainController.php

// Unreachable statement demasligi uchu shu class ni ishlatamiz
use JetBrains\PhpStorm\NoReturn;

// #[NoReturn] uchun


require_once __DIR__ . '/imports.php';

if (!empty($_GET['controller'])) {
    $controller = $_GET['controller'];

    switch ($controller) {
        case 'news_view':
        {
            /*
             get so'rovdagi id ni olish
            $id = htmlspecialchars($_GET['id']);
            $id = htmlentities($_GET['id']);
            $id = strip_tags($_GET['id']);
            $id = html_entity_decode($_GET['id']);
            */
            // id ni int ga o'tkazish, agar son bo'lmasa 0 ni olsin
            $id = (int)($_GET['id'] ?? 0);

            // id larni keshlash
            static $all_ids = null;
            if ($all_ids === null) {
                $all_ids = getAllNewsIds();
            }

            // agar id 0 ga teng oyki undan kichik bo'lsa yoki
            // yangiliklar jadvalida bunday id bo'lmasa
            if ($id <= 0 || !in_array($id, $all_ids, true)) {
                show404(); // error 404 ga o'tsin
            }

            // id orqali yangilikni olish
            $newsItem = getNewsById($id);

            if (!updateCount($id)) {
                $_SESSION['error'] = "Ko'rishlar soni o'zgarmadi"; // update qilishda muammo bo'ldi
            } else {
                require_once __DIR__ . '/../views/view.php';
            }

            /*
                        // yangilik necha marta ko'rilganini inkrement qilish
                        if (updateCount($id)) {
                            // shundan keyingina yangilik sahifasini ulasin
                            require_once __DIR__ . '/../views/view.php';
                        }
            */

            // agar id false bo'lsa
            if (!$newsItem) {
                show404(); // error 404 ga o'tsin
            }

            // keyingi case larga o'tib ketmasin!
            break;
        }
        case
        'news_category':
        {
            require_once __DIR__ . '/../views/view.php';
            break;
        }

        case 'all_news':
        {
            require_once __DIR__ . '/../views/news.php'; // blog.html
            break;
        }

        default:
        {
            show404();  // agar get so'rovda umuman boshqacha case bo'lsa
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