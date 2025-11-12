<?php
// admin/adminController.php

session_abort();

if (file_exists(__DIR__ . '/../../models/mainModel.php')) {
    require_once __DIR__ . '/../../models/mainModel.php';
} else {
    exit("Asosiy model ulanmagan!");
}

if (!empty($_GET['acontroller'])) {
    $controller = $_GET['acontroller'];

    switch ($controller) {
        case 'menu_index':
        {
            $menus = getAllMenus();   // bazadan menyularni olish
            require_once __DIR__ . '/../views/menu/menu_index.php';
            break;
        }

        case 'menu_create':
        {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                /*
                      htmlspecialchars()  XSS dan himoya qiladi.
                      trim()  Bo‘sh joylarni olib tashlaydi.
                      filter_var(..., FILTER_SANITIZE_URL)  havola (URL) ni tozalaydi.
                      (int)  status ni raqamga aylantiradi, bu SQL Injection xavfini kamaytiradi.
                      $_POST['...'] ?? ''  agar kalit yo‘q bo‘lsa, xatolik chiqmasligi uchun.
                    */
                if (!empty($_POST)) {
                    $name = htmlspecialchars(trim($_POST['name'] ?? ''), ENT_QUOTES, 'UTF-8');
                    $position = htmlspecialchars(trim($_POST['position'] ?? ''), ENT_QUOTES, 'UTF-8');
                    $url = filter_var(trim($_POST['url']) ?? '', FILTER_SANITIZE_URL);
                    $status = isset($_POST['status']) ? (int)$_POST['status'] : 0;

                    if (!empty($name) && !empty($position) && !empty($url)) {
//                        if (!menuExists($name, $url)) {

                            if (menuCreate($name, $position, $url, $status)) {
                                header('Location: ?acontroller=menu_index');
                                exit();
                            } else {
                                echo "Barcha maydonlar to'ldirilishi kerak!";
                            }
                        } // else {
//                            echo "Dublikat maydon mavjud, qayta tekshiring!";
//                        }
//                    }
                }
            }
            require_once __DIR__ . '/../views/menu/menu_form.php';
            break;
        }

        case 'menu_update':
        {
            // ID mavjudligini va toza integerligini tekshirish:
            $id = isset($_GET['id']) ? (int)trim($_GET['id']) : 0; // id getda bo'lsa int casting, aks holda 0 olsin
            if ($id <= 0) {
                require_once __DIR__ . '/../views/404.php';
                exit();
            }

            // jadvaldagi qiymatni olamiz
            $menuItem = getMenuById($id);

            // agar menu jadvalida bunday id li yozuv topilmasa 404
            if (NULL === $menuItem) {
                require_once __DIR__ . '/../views/404.php';
                exit();
            }

            // agar topilsa forada ko'rsatilsin
            require_once __DIR__ . '/../views/menu/menu_form.php';
            break;
        }

        case 'menu_delete':
        {
//            require_once __DIR__ . '/../views/menu/menu_index.php';
            break;
        }

        default:
        {

        }
    }
} else {
    require_once __DIR__ . "/../views/index.php";
}