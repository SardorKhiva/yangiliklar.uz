<?php
// bu fayl quyidagicha ma'lumotni (masalan) olib beradi har bir ulangan sahifasi uchun:
// Sahifa sarlavhasi: Asosiy sahifacha
// Array ( [id] => 1 [name] => Asosiy sahifacha [position] => 1 [url] => /index.php [status] => 1 )

require_once MAIN_CONTROLLER;  // asosiy controllerni ulash
require_once SQLITE_PDO_CONN;  // SQLite ga ulanish

$currentFile = basename($_SERVER['PHP_SELF']); // fayl nomi

global $getMenuItems;
// getMenuItems massivini tekshirish
$pageItem = array_filter($getMenuItems, function ($item) use ($currentFile) {
    return ltrim($item['url'], '/') === $currentFile;
});
$pageItem = reset($pageItem);
$currentPage = !empty($pageItem['name']) ? $pageItem['name'] : SITE_NAME;

//echo "Sahifa sarlavhasi:" . PHP_EOL;
//echo $currentPage . PHP_EOL;
//print_r ($pageItem);