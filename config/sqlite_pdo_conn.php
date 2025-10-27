<?php
const CONSTS_PATH = __DIR__ . '/../config/CONSTANTS.php';
if (file_exists(CONSTS_PATH)) {
    require_once CONSTS_PATH;
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