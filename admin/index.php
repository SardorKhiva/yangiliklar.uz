<?php

if (file_exists(__DIR__ . "/controllers/adminController.php")) {
    require_once __DIR__ . "/controllers/adminController.php";
}
//echo __FILE__;
require_once __DIR__ . '/views/index.php';
