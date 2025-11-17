<?php
//D:\exe\OSPanel_5_4_3\domains\yangiliklar.uz\admin\controllers\menuAdminController.php

if (!empty($_GET['acontroller'])) {
    $controller = $_GET['acontroller'];
    $menusAll = getAllMenus();   // bazadan menyularni olish

    switch ($controller) {
        case 'menu_index':
        {
            require_once __DIR__ . '/../views/menu/menu_index.php';
            break;
        }

        case 'menu_create':
        {
            if (($_SERVER['REQUEST_METHOD'] === 'POST')) {
                $name = trim($_POST['name']);
                $position = htmlspecialchars(trim($_POST['position'] ?? ''), ENT_QUOTES, 'UTF-8');
                $url = filter_var(trim($_POST['url']) ?? '', FILTER_SANITIZE_URL);
                $status = isset($_POST['status']) ? ACTIVE : NOT_ACTIVE;

                if (empty($name)) {
                    $_SESSION['error'] = "Menyu nomi bo'sh bo'lmasligi kerak!";
                } elseif (empty($url)) {
                    $_SESSION['error'] = "Menyu urli bo'sh bo'lmasligi kerak!";
                } elseif (menuNameExists($name, 0)) {
                    $_SESSION['error'] = "Bunday menyu nomi mavjud!";
                } else {
                    if (menuCreate($name, $position, $url, $status)) {
                        $_SESSION['success'] = "Menyu qo'shildi!";
                        header("location: ?acontroller=menu_index");
                        exit();
                    } else {
                        $_SESSION['error'] = "Menyu qo'shishda xatolik!";
                    }
                }
            }
            $menuItem = null;
            require_once __DIR__ . '/../views/menu/menu_form.php';
            break;
        }

        case 'menu_update':
        {
            // ID mavjudligini va toza integerligini tekshirish:
            $id = !empty($_GET['id']) ? (int)$_GET['id'] : 0; // id getda bo'lsa int casting, aks holda 0 olsin

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

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//                $id = trim($_POST['id']) ?? $menuItem['id'];
                $name = trim($_POST['name']);
                $url = filter_var(trim($_POST['url']) ?? '', FILTER_SANITIZE_URL);
                $position = htmlspecialchars(trim($_POST['position'] ?? ''), ENT_QUOTES, 'UTF-8');
                $status = isset($_POST['status']) ? (int)$_POST['status'] : 0;

                if (empty($name)) {
                    $_SESSION['error'] = "Menyu nomi bo'sh bo'lmasligi kerak!";
                } elseif (empty($url)) {
                    $_SESSION['error'] = "Menyu manzili bo'sh bo'lmasligi kerak!";
                } elseif (menuNameExists($name, $id)) {
                    $_SESSION['error'] = "Bunday menyu nomi mavjud!";
                } else {
                    if (menuUpdate($id, $name, $position, $url, $status)) {
                        $_SESSION['success'] = "Menyu elementi yangilandi!";
                        header("location: ?acontroller=menu_index");
                        exit();
                    } else {
                        $_SESSION['error'] = "Menyu yangilashda xatolik!";
                    }
                }
                $menuItem['name'] = $name;
                $menuItem['url'] = $url;
                $menuItem['status'] = $status;
                $menuItem['position'] = $position;

            }

            // agar topilsa forada ko'rsatilsin
            require_once __DIR__ . '/../views/menu/menu_form.php';
            break;
        }

        case 'menu_delete':
        {
            if (!empty($_GET['id'])) {
                $id = (int)($_GET['id']);

                if (menuDelete($id)) {
                    $_SESSION['success'] = "Menyu muvaffaqiyatli o'chirildi!";
                } else {
                    $_SESSION['error'] = "Menyu o'chirishda xatolik!";
                }
                header('Location: ?acontroller=menu_index');
                exit();
            }
            break;
        }
    }
} else {
    require_once __DIR__ . "/../views/index.php";
}