<?php
/**
 * Foydalanuvchi: User
 * Loyiha nomi: yangiliklar.uz
 * Fayl nomi: imports.php
 * Fayl yaratilgan: 06.11.2025 22:15
 * Maqsad: barcha sayt elementlari ma'lumotlarini yig'ib oluvchi controller
 */

// asosiy modelni ulash orqali barcha modellarni ulash:
require_once __DIR__ . '/../models/mainModel.php';

$menus = getMenus();            // menu dagi elementlar
$socials = getSocials();        // footer dagi ijtimoiy tarmoqlar
$categories = getCategories();  // yangiliklar kategoriyalari
$news = getLastNews();          // oxirgi 3 ta yangilik
$allNews = getAllNews();        // barcha yangiliklar
$banner = getBannerNews();      // bannerdagi yangiliklar, standart 6 ta
$ommabopYangiliklar = popularNews();  // eng ko'p ko'rilgan yangiliklar 6 tadan

