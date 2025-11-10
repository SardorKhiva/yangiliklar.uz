<?php

if (file_exists(__DIR__ . '/../../models/mainModel.php')) {
    require_once __DIR__ . '/../../models/mainModel.php';
}

if (file_exists(__DIR__ . "/../views/index.php")) {
    require_once __DIR__ . "/../views/index.php";
}

//echo "Bu Admin Controller";