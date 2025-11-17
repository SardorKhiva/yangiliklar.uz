<?php
// D:\exe\OSPanel_5_4_3\domains\yangiliklar.uz\admin\controllers\categoryAdminController.php

if (!empty($_GET['acontroller'])) {
    $controller = $_GET['acontroller'];
    $categoriesAll = getAllCategories();

    switch ($controller) {
        case 'category_index':
        {
            require_once __DIR__ . '/../views/categories/category_index.php';
            break;
        }

        case 'category_create':
        {
//            dd($_POST);
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//                $id = (int)$_POST['id'] ?? (int)$_GET['id'] ?? 0;
                $name = trim($_POST['name']);
                $status = isset($_POST['status']) ? ACTIVE : NOT_ACTIVE;

                // Kategoriya nomi to'ldirilganini tekshirish
                if (empty($name)) {
                    $_SESSION['error'] = "Kategoriya nomi kiritilishi kerak!";
                } // Kategoriya mavjudligini tekshirish (yangi kategoriya uchun id = 0)
                elseif (categoryNameExists($name, 0)) {
                    $_SESSION['error'] = "Bunday kategoriya avvaldan bor!";
                } // Yangi kategoriya qo'shish
                else {
                    if (categoryCreate($name, $status)) {
                        $_SESSION['success'] = "Kategoriya qo'shildi!";
                        header('Location: ?acontroller=category_index');
                        exit();
                    } else {
                        $_SESSION['error'] = "Kategoriya qo'shishda xatolik!";
                    }
                }
            }
            $categoryItem = null;  // bo'sh forma uchun
            require_once __DIR__ . '/../views/categories/category_form.php';
            break;
        }

        case 'category_update':
        {
            $id = !empty($_GET['id']) ? (int)$_GET['id'] : 0;

            if ($id <= 0) {
                require_once __DIR__ . '/../views/404.php';
                exit();
            }

            $categoryItem = getCategoryByID($id);

            if (NULL === $categoryItem) {
                require_once __DIR__ . '/../views/404.php';
                exit();
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $name = htmlspecialchars($_POST['name'] ?? '', ENT_QUOTES, 'UTF-8');
                $status = isset($_POST['status']) ? ACTIVE : NOT_ACTIVE;

                if (empty($name)) {
                    $_SESSION['error'] = "Kategoriya nomi yozilishi kerak!";
                } // yana shunday kategoriya bor-yo'qligini tekshirish
                elseif (categoryNameExists($name, $id)) {
                    $_SESSION['error'] = "Kategoriya nomi avval ishlatilgan!";
                } else {
                    if (categoryUpdate($id, $name, $status)) {
                        $_SESSION['success'] = "Kategoriya yangilandi!";
                        header('Location:?acontroller=category_index');
                        exit();
                    } else {
                        $_SESSION['error'] = "Kategoriya yangilashda xatolik!";
                    }
                }
                // xatolik bo'lsa yangi ma'lumotlarni ko'rsatish
                $categoryItem['name'] = $name;
                $categoryItem['status'] = $status;
            }
            require_once __DIR__ . '/../views/categories/category_form.php';
            break;
        }

        case 'category_delete':
        {
            if (!empty($_GET['id'])) {
                $id = (int)$_GET['id'];

                if (categoryDelete($id)) {
                    $_SESSION['success'] = "kategoriya muvaffaqiyatli o'chirildi!";
                } else {
                    $_SESSION['error'] = "Kategoriya o'chirishda xatolik!";
                }

                header('Location: ?acontroller=category_index');
                exit();
            }
            break;
        }
    }

}