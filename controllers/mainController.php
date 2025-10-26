<?php
// mainController.php

require_once __DIR__ . '/../config/CONSTANTS.php';
require_once MAIN_MODEL;  // asosiy modelni qo'shish

// modeldagi ma'lumotlarni olish
$getMenuItems = getMenuItems();
$getSocailMediaItems = getSocialMediaItems();
$getLastNews = getLastNews();

// tekshirish uchun:
/*
echo "<pre>";
print_r($getLastNews);
echo "</pre>";
*/