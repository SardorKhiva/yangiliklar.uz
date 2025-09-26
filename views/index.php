<?php
// views/index.php

require_once dirname(__DIR__, 1) . '/config/CONSTANTS.php';

// asosiy controller ni views/index.php ga qo'shish
if (file_exists(MAIN_CONTROLLER)) {
    require_once MAIN_CONTROLLER;
} else {
    echo 'main controller papkasi yo\'q';
}
