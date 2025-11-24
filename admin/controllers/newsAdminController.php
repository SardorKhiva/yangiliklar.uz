<?php
//D:\exe\OSPanel_5_4_3\domains\yangiliklar.uz\admin\controllers\newsAdminController.php

require_once __DIR__ . '/../../models/mainModel.php';
static $allAuthors = getAllAuthors();          // barcha mualliflar
static $newsAll = getAllNews();                // hamma yangiliklar
static $categories = getAllCategories();       // hamma kategoriyalar
static $oxirgiID = lastNewsID();                      // oxirgi yangilik ID si

$data = [];

if (!empty($_GET['acontroller'])) {
    $controller = trim($_GET['acontroller']);

    switch ($controller) {
        case 'news_index':
        {
            require_once __DIR__ . '/../views/news/news_index.php';
            break;
        }
        case 'news_create':
        {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $sarlavha = trim($_POST['sarlavha'] ?? '');
                $qisqa_tavsif = trim($_POST['qisqa_tavsif'] ?? '');
                $yangilik_matni = trim($_POST['yangilik_matni'] ?? '');
                $kategoriya = trim($_POST['kategoriya'] ?? '');
                $muallif = trim($_POST['muallif'] ?? '');
                $rasm = $_FILES['rasm']['name'] ?? null;
                $status = isset($_POST['status']) ? 1 : 0;

                // Fayl upload
                if (!empty($_FILES['rasm']['name'])) {
                    $uploadDir = __DIR__ . '/../../uploads/news/' . $oxirgiID . '/';
                    if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);

                    $fileName = basename($_FILES['rasm']['name']);
                    move_uploaded_file($_FILES['rasm']['tmp_name'], $uploadDir . $fileName);

                    $rasm = $fileName;
                } else {
                    $rasm = null;
                }

                // created data validation
                if (empty($muallif) || empty($sarlavha) || empty($kategoriya)) {
                    if (empty($muallif)) {
                        $_SESSION['error'] = "Yangilik muallifi kiritilmadi";
                    }
                    if (empty($sarlavha)) {
                        $_SESSION['error'] = "Yangilik sarlavhasi kiritilmadi";
                    }
                    if (empty($kategoriya)) {
                        $_SESSION['error'] = "Yangilik kategoriyasi kiritilmadi";
                    }
                } else {
                    if (newsCreate($sarlavha, $qisqa_tavsif, $kategoriya, $muallif, $yangilik_matni, $rasm, $status)) {
                        $_SESSION['success'] = "Yangilik qo'shildi";
                        header("Location: ?acontroller=news_index");
                        exit();
                    } else {
                        $_SESSION['error'] = "Yangilik qo'shib bo'lmadi";
                    }
                }

            }
            $newsOneItem = null;

            require_once __DIR__ . '/../views/news/news_form.php';
            break;
        }

        case 'news_update':
        {
//            echo 1;
            require_once __DIR__ . '/../views/news/news_form.php';
            break;
        }

        case 'news_delete':
        {
            if (!empty($_GET['id'])) {
                $id = (int)$_GET['id'] ?? 0;

                if (newsDelete($id)) {
                    $_SESSION['success'] = "Yangilik o'chirildi!";
                } else {
                    $_SESSION['error'] = "Yangilik o'chirishda xatolik!";
                }
                header("Location: ?acontroller=news_index");
                exit();
            }

            break;
        }
    }
} else {
    require_once __DIR__ . "/../views/index.php";
}