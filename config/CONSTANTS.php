<?php
// /config/CONSTANTS.php

// Bu faylda fayllarga yo'llar va asosiy constantalar saqlanadi

const SITE_NAME = 'Yangiliklar.uz';
define('PROJECT_ROOT', dirname(__DIR__)); // loyiha asosiy ildiz papkasi
//const PROJECT_ROOT = __DIR__ . '/..'; // Loyiha ildiz papkasi
const PAGE_DETAILS = PROJECT_ROOT . '/views/page_details.php';
const HELPERS_PATH = PROJECT_ROOT . '/helpers.php';

// bazalar parametrlari
// database connect path
const SQLITE_PDO_CONN = PROJECT_ROOT . '/config/sqlite_pdo_conn.php';   // sqlite ga ulanuvchi php fayl

const SQLITE_DB_LOCATION = PROJECT_ROOT . '/databases/sqlite.sqlite3';  // sqlite baza manzili
const MYSQL_PDO_CONN = PROJECT_ROOT . '/mysql_pdo_conn.php'; // mysql ga ulanuvchi php fayl
const HOST = '127.0.0.1';
const PORT = 3306;
const DB_NAME = 'yangiliklar_uz';
const DB_USER = 'root';
const DB_PASSWORD = '';
const MYSQL_DSN = 'mysql:host=' . HOST . ';port=' . PORT . ';dbname=' . DB_NAME;

const ACTIVE = TRUE;
const INACTIVE = FALSE;

// Modellar yo'llari:
const MAIN_CONTROLLER = PROJECT_ROOT . '/controllers/mainController.php'; // asosiy controller yo'li
const MAIN_MODEL = PROJECT_ROOT . '/models/mainModel.php';  // asosiy model yo'li
const MENU_MODEL_PATH = PROJECT_ROOT . '/models/menuModel.php';
const SOCIAL_MODEL_PATH = PROJECT_ROOT . '/models/socialModel.php';
const NEWS_MODEL_PATH = PROJECT_ROOT . '/models/newsModel.php';


// Assets (frontend fayllar)
const ASSETS_PATH = PROJECT_ROOT . '/assets';
const CSS_PATH = ASSETS_PATH . '/css';
const JS_PATH = ASSETS_PATH . '/js';
const IMG_PATH = ASSETS_PATH . '/images';

// Vendor (kutubxonalar)
const VENDOR_PATH = PROJECT_ROOT . '/vendor';

// index.php qismlari yo'llari:
const VIEWS_INDEX = PROJECT_ROOT . '/views/index.php';
const HEAD_INDEX = PROJECT_ROOT . '/views/index-widgets/head.php';
const HEADER_INDEX = PROJECT_ROOT . '/views/index-widgets/header.php';
const PRELOADER_INDEX = PROJECT_ROOT . '/views/index-widgets/preloader.php';
const BANNER_INDEX = PROJECT_ROOT . '/views/index-widgets/banner.php';
const SECTIONS_INDEX = PROJECT_ROOT . '/views/index-widgets/sections.php';
const FOOTER_INDEX = PROJECT_ROOT . '/views/index-widgets/footer.php';
const JS_SCRIPTS_INDEX = PROJECT_ROOT . '/views/index-widgets/js_scripts.php';


// about.php qismlari yo'llari:
const VIEWS_ABOUT = PROJECT_ROOT . '/views/about.php';
//const HEAD_ABOUT = PROJECT_ROOT . '/views/about-widgets/head.php';
//const PRELOADER_ABOUT = PROJECT_ROOT . '/views/about-widgets/preloader.php';
//const HEADER_ABOUT = PROJECT_ROOT . '/views/about-widgets/header.php';
const BANNER_ABOUT = PROJECT_ROOT . '/views/about-widgets/banner.php';
const SECTION_ABOUT = PROJECT_ROOT . '/views/about-widgets/section.php';
//const FOOTER_ABOUT = PROJECT_ROOT . '/views/about-widgets/footer.php';
//const JS_SCRIPTS_ABOUT = PROJECT_ROOT . '/views/about-widgets/js_scripts.php';

// contact.php qismlari yo'llari:
const VIEWS_CONTACT = PROJECT_ROOT . '/views/contact.php';
//const HEAD_CONTACT = PROJECT_ROOT . '/views/contact-widgets/head.php';
//const PRELOADER_CONTACT = PROJECT_ROOT . '/views/contact-widgets/preloader.php';
//const HEADER_CONTACT = PROJECT_ROOT . '/views/contact-widgets/header.php';
const BANNER_CONTACT = PROJECT_ROOT . '/views/contact-widgets/banner.php';
const SECTION_CONTACT = PROJECT_ROOT . '/views/contact-widgets/section.php';
//const FOOTER_CONTACT = PROJECT_ROOT . '/views/contact-widgets/footer.php';
//const JS_SCRIPTS_CONTACT = PROJECT_ROOT . '/views/contact-widgets/js_scripts.php';


// news.php qismlari yo'llari:
const VIEWS_NEWS = PROJECT_ROOT . '/views/news.php';
//const HEAD_NEWS = PROJECT_ROOT . '/views/news-widgets/head.php';
//const PRELOADER_NEWS = PROJECT_ROOT . '/views/news-widgets/preloader.php';
//const HEADER_NEWS = PROJECT_ROOT . '/views/news-widgets/header.php';
const BANNER_NEWS = PROJECT_ROOT . '/views/news-widgets/banner.php';
const SECTION_NEWS = PROJECT_ROOT . '/views/news-widgets/sections.php';
//const FOOTER_NEWS = PROJECT_ROOT . '/views/news-widgets/footer.php';
//const JS_SCRIPTS_NEWS = PROJECT_ROOT . '/views/news-widgets/js_scripts.php';


// news-details.php qismlari yo'llari:
const VIEWS_NEWS_DETAILS = PROJECT_ROOT . '/views/news-details.php';
//const HEAD_NEWS_DETAILS = PROJECT_ROOT . '/views/news-details-widgets/head.php';
//const PRELOADER_NEWS_DETAILS = PROJECT_ROOT . '/views/news-widgets/preloader.php';
//const HEADER_NEWS_DETAILS = PROJECT_ROOT . '/views/news-widgets/header.php';
const BANNER_NEWS_DETAILS = PROJECT_ROOT . '/views/news-widgets/banner.php';
const SECTIONS_NEWS_DETAILS = PROJECT_ROOT . '/views/news-widgets/sections.php';
//const FOOTER_NEWS_DETAILS = PROJECT_ROOT . '/views/news-widgets/footer.php';
//const JS_SCRIPTS_NEWS_DETAILS = PROJECT_ROOT . '/views/news-widgets/js_scripts.php';