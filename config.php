<?php
// mysql pdo parametrlari:
const HOST = '127.0.0.1';  // localhost
const DB_NAME = 'mohirdev';
const USER_NAME = 'root';
const PASSWORD = '';

// elementni faol yoki nofaol qilish flaglari
const ACTIVE = 1;
const NOT_ACTIVE = 0;

// Saytni o'zini parametrlari:
const SITE_NAME = 'Yangiliklar.uz';                      // sayt nomi
const SLOGAN = "Eng qiziqarli yangiliklar bizda!";       // sayt shiori
const TELEFON_RAQAM = '+998-12-345-67-89';
const EMAIL_MANZIL = 'leaderkhiva@gmail.com';
const ADDRESS = "99H6+32Q, Unnamed Rd, Xiva, Xorazm Viloyati, O'zbekiston";

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