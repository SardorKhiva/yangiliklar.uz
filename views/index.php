<?php
// views/index.php
require_once dirname(__DIR__) . '/config/CONSTANTS.php';
require_once SQLITE_PDO_CONN;  // SQLite ga ulanish


// asosiy controller ni views/index.php ga qo'shish
require_once MAIN_CONTROLLER;

/*
1 head
2 preloader
3 header
4 banner
5 sections
6 footer
7 js_scripts
*/

require_once HEAD_INDEX;
require_once PRELOADER_INDEX;
require_once HEADER_INDEX;
require_once BANNER_INDEX;
require_once SECTIONS_INDEX;
require_once FOOTER_INDEX;
require_once JS_SCRIPTS_INDEX;