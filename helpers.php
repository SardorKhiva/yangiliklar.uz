<?php
/**
 * dd - massivni debug qiladi,
 * die = true bo'lsa debug dan keyingi kodlar to'xtaydi
 * @param array $arr
 * @param false $die
 * @return void
 */
function dd(array $arr, bool $die = false): void
{
    echo '<pre>';
    print_r($arr);
    echo '</pre>';

    // PhpStorm "unreachable" deb o‘ylamasligi uchun
    if ($die) {
        exit; // exit() o‘rniga shart bilan to‘xtatish
    } else {
        flush(); // chiqishni majburan ko‘rsatish
    }
}


function getImage(string $table_name, int $id, string $filename): string
{
    if (empty($filename)) {
        return '/assets/images/default.jpg';
    }

    $relativePath = "uploads/$table_name/$id/$filename";

    // absolyut yo'ldan qidirish
    if (file_exists(PROJECT_ROOT . $relativePath)) {
        // absolyut yo'lni qaytarish
        return '/' . $relativePath;
    }

    return '/assets/images/default.jpg';
}