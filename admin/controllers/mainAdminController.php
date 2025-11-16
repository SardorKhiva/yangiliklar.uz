<?php
// admin/mainAdminController.php

session_start();

if (file_exists(__DIR__ . '/../../models/mainModel.php')) {
    require_once __DIR__ . '/../../models/mainModel.php';
} else {
    exit("Asosiy model ulanmagan!");
}

require_once __DIR__ . '/menuAdminController.php';
require_once __DIR__ . '/categoryAdminController.php';