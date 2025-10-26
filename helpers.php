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
function getImage(string $folder, int $id, string $filename): string
{
    if (empty($filename)) {
        return 'assets/images/default.jpg';
    }
    $imagepath = "uploads/$folder/$id/$filename";
    if (file_exists($imagepath)) {
        return $imagepath;
    }
    return 'assets/images/default.jpg';
}