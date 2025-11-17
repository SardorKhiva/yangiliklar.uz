<?php
/**
 * Foydalanuvchi: User
 * Loyiha nomi: yangiliklar.uz
 * Fayl nomi: CONSTANTS.php
 * Fayl yaratilgan: 10.11.2025 11:44
 * Maqsad: Barcha constantalar
 */

// Project root path:
define('PROJECT_ROOT', $_SERVER['DOCUMENT_ROOT'] . '/');

// Admin constantalar (frontend fayllar)
//define('ADMIN_PATH', PROJECT_ROOT . 'admin');

define('ADMIN_ROOT', '/admin');
const ADMIN_ASSETS = ADMIN_ROOT . '/assets';    //  /admin
const ADMIN_CSS = ADMIN_ASSETS . '/css';        //  /admin/css
const ADMIN_JS = ADMIN_ASSETS . '/js';          //  /admin/js
const ADMIN_IMG = ADMIN_ASSETS . '/img';        //  /admin/img

const FRONT_FAS = "/assets/css/all.min.css";

// Vendor (kutubxonalar)
const VENDOR_PATH = PROJECT_ROOT . '/vendor';


// elementni faol yoki nofaol qilish flaglari
const ACTIVE = 1;
const NOT_ACTIVE = 0;

// Saytni o'zini parametrlari:
const SITE_NAME = 'Yangiliklar.uz';                      // sayt nomi
const SLOGAN = "Eng qiziqarli yangiliklar bizda!";       // sayt shiori
const TELEFON_RAQAM = '+998-12-345-67-89';
const EMAIL_MANZIL = 'leaderkhiva@gmail.com';
const ADDRESS = "99H6+32Q, Unnamed Rd, Xiva, Xorazm Viloyati, O'zbekiston";
