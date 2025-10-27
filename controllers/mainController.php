<?php
// mainController.php

require_once __DIR__ . '/../config/CONSTANTS.php';
require_once MAIN_MODEL;  // asosiy modelni qo'shish

if (!empty($_GET) && !empty($_GET['controller'])) {
    $controller = $_GET['controller'];
        die($controller);
//    switch ($controller) {
//        case 'news':{
//
//        }
//    }
}

// modeldagi ma'lumotlarni olish
$getMenuItems = getMenuItems();
$getSocailMediaItems = getSocialMediaItems();
$news = getLastNews();