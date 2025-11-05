<?php
/**
 * Foydalanuvchi: User
 * Loyiha nomi: yangiliklar.uz
 * Fayl nomi: helpers.php
 * Fayl yaratilgan: 04.11.2025 8:56
 * Maqsad: qo'shimcha yordamchi funksiyalar
 */


define('PROJECT_ROOT', $_SERVER['DOCUMENT_ROOT'] . '/');

// debug funksiya, massivdan nimalar kelyotganini tekshirish uchun
function dd(mixed $arr, bool $die = false): void
{
    echo "<pre>";
    print_r($arr);
    echo "</pre>";

//    agar $die = true bo'lsa shu joydan keyin skriptlar bajarilishini to'xtatsin
    if ($die) {
        die();
    }
}


function getImage(string $table_name, int $id, mixed $filename): string
{
    if (empty($filename)) {
        return '/assets/images/no_image.png';
    }

    $relativePath = "uploads/$table_name/$id/$filename";

    // absolyut yo'ldan qidirish
    if (file_exists(PROJECT_ROOT . $relativePath)) {
        // absolyut yo'lni qaytarish
        return '/' . $relativePath;
    }

    return '/assets/images/no_image.png';
}