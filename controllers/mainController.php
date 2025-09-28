<?php
// mainController.php


require_once __DIR__ . '/../config/CONSTANTS.php';

// asosiy modelni qo'shish
require_once MAIN_MODEL;

$getMenuItems = getMenuItems();

// tekshirish uchun:
//echo "<pre>";
//print_r($getMenuItems);
//echo "</pre>";