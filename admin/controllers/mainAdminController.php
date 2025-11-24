<?php
// admin/mainAdminController.php

session_start();

if (file_exists(__DIR__ . '/../../models/mainModel.php')) {
    require_once __DIR__ . '/../../models/mainModel.php';
} else {
    exit("Asosiy model ulanmagan!");
}

// menu ni boshqaruvchi controller:
require_once __DIR__ . '/menuAdminController.php';

// kategoriyalarni boshqaruvchi controller:
require_once __DIR__ . '/categoryAdminController.php';

// yangiliklarni bohqaruvchi:
require_once __DIR__ . '/newsAdminController.php';