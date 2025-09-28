<?php

$currentPage = 'Yangiliklar tafsilotlari';

require_once __DIR__ . '/../config/CONSTANTS.php';
require_once MAIN_CONTROLLER;
require_once SQLITE_PDO_CONN;  // SQLite ga ulanish

require_once HEAD_INDEX;
require_once PRELOADER_INDEX;
//require_once HEADER_NEWS_DETAILS;
require_once HEADER_INDEX;
require_once BANNER_NEWS_DETAILS;
require_once SECTIONS_NEWS_DETAILS;
require_once FOOTER_INDEX;
require_once JS_SCRIPTS_INDEX;