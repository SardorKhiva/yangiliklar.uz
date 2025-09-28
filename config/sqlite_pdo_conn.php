<?php

if (file_exists(__DIR__ . '/../config/CONSTANTS.php')) {
    require_once __DIR__ . '/../config/CONSTANTS.php';
//    echo "Constantalar ulandi\n";
} else {
    echo "Constantalar ulanmadi\n";
}


try {
    $pdo = new PDO("sqlite:" . SQLITE_DB_LOCATION); // SQLITE_DB_LOCATION => const SQLITE_DB_LOCATION = __DIR__ . '/../databases/sqlite.sqlite3';
//    echo 'SQLite ulandi' . PHP_EOL;
} catch (PDOException $e) {
    echo 'SQLite orqali ulanishda xatolik: ' . $e->getMessage();
}