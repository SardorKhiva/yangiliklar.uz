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

$activeMenus = getActiveMenus();        // menu dagi active elementlar
$menus = getAllMenus();                 // menu dagi barcha elementlar
$socials = getSocials();                // footer dagi ijtimoiy tarmoqlar
$categories = getCategories();          // yangiliklar kategoriyalari
$categoriesAll = getAllCategories();    // hamma kategoriyalar
$news = getLastNews();                  // oxirgi 3 ta yangilik
$allNews = getAllNews();                // barcha yangiliklar
$banner = getBannerNews();              // bannerdagi yangiliklar, standart 6 ta


// Pagination uchun
$currentPage = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
$paginationData = getPaginatedPopularNews($currentPage, 6);
$ommabopYangiliklar = $paginationData['news'];    // yangiliklar
$totalPages = (int)$paginationData['totalPages']; // jami sahifalar (int ga cast)
$currentPage = (int)$paginationData['currentPage']; // joriy sahifa (int ga cast)
$totalNews = (int)$paginationData['totalNews'];   // jami yangiliklar soni (int ga cast)