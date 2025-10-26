<?php
// mainModel.php

require_once __DIR__ . '/../config/CONSTANTS.php'; // constantalar va yo'llar
require_once SQLITE_PDO_CONN; // sqlite ga ulanish
require_once HELPERS_PATH;  // debug funksiyalar

// asosiy modelga boshqa modellarni ulash
require_once MENU_MODEL_PATH;   // asosiy modelga menu modeli
require_once SOCIAL_MODEL_PATH; // ijtimoiy tarmoqlar modeli
require_once NEWS_MODEL_PATH;   // yangiliklar modeli
require_once CATEGORIES_MODEL_PATH; // kategoriyalar modeli

//dd(getLastNews(), 1);