<?php
const HOST = '127.0.0.1';  // localhost
const DB_NAME = 'mohirdev';
const USER_NAME = 'root';
const PASSWORD = '1302';
const ACTIVE = 1;

define('SITE_NAME', 'Yangiliklar.uz');                      // sayt nomi
define('SLOGAN', "Eng qiziqarli yangiliklar bizda!");       // sayt shiori

const SQLITE_DB_PATH = __DIR__. '/db/sqlite.sqlite3';  // SQLite baza yo'li 

try {
    $pdo = new PDO('sqlite:' . SQLITE_DB_PATH);
//    echo 'SQLite bazaga ulandi!' . "<br>";
} catch (PDOException $e) {
    echo 'SQLite bazaga ulanishda xatolik bo\'ldi: ' . $e->getMessage() . "<br>";
}