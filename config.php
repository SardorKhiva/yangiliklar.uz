<?php
/*** baza bilan ishlovchi fayl */

// mysql pdo parametrlari:
const HOST = '127.0.0.1';  // localhost
const DB_NAME = 'mohirdev';
const USER_NAME = 'root';
const PASSWORD = '';

const SQLITE_DB_PATH = __DIR__ . '/db/sqlite.sqlite3';  // SQLite baza yo'li

$pdo = NULL;

// agar SQLite baza fayli mavjud bo'lmasa MySQL ga ulanishga xarakat qilsin
if (file_exists(SQLITE_DB_PATH)) {
    try {
        $pdo = new PDO('sqlite:' . SQLITE_DB_PATH);
//    echo 'SQLite bazaga ulandi!' . "<br>";
    } catch (PDOException $e) {
        echo 'SQLite bazaga ulanishda xatolik bo\'ldi: ' . $e->getMessage() . "<br>";
    }
} else {
    try {
        $pdo = new PDO("mysql: host=" . HOST . "; dbname=" . DB_NAME, USER_NAME, PASSWORD);
    } catch (PDOException $e) {
        echo "Siz MySQL bazaga ulana olmadinggiz: " . $e->getMessage();
        exit("Xayr!");
    }
}