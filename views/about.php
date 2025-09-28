<?php
require_once __DIR__ . '/../config/CONSTANTS.php';  // asosiy birlik va yo'llar
require_once MAIN_CONTROLLER;
require_once SQLITE_PDO_CONN;  // SQLite ga ulanish

//$currentPage = $getMenuItems['name'];

/*
1 head
2 preloader
3 header
4 banner
5 section
6 footer
7 js_scripts
*/

require_once HEAD_INDEX;
require_once PRELOADER_INDEX;
//require_once HEADER_ABOUT;
require_once HEADER_INDEX;
require_once BANNER_ABOUT;
require_once SECTION_ABOUT;
require_once FOOTER_INDEX;
require_once JS_SCRIPTS_INDEX;