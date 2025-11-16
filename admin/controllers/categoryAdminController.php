<?php
/**
 * Foydalanuvchi: User
 * Loyiha nomi: yangiliklar.uz
 * Fayl nomi: categoryAdminController.php
 * Fayl yaratilgan: 16.11.2025 12:29
 * Maqsad:
 */

if (!empty($_GET['acontroller'])) {
    $controller = $_GET['acontroller'];
    $categoriesAll = getAllCategories();

    switch ($controller) {
        case 'category_index':
        {
            require_once __DIR__ . '/../views/categories/category_index.php';
            break;
        }

        case 'category_update':
        {
            require_once __DIR__ . '/../views/categories/category_update.php';
            break;
        }

        case 'category_delete':
        {
            if (!empty($_GET['id'])) {
                $id = htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8');
                if (categoryDelete($id)) {
                    $_SESSION['success'] = "kategoriya muvaffaqiyatli o'chirildi!";
                    header('Location: ?acontroller=category_index');
                    exit();
                }
            }
            break;
        }
    }

}