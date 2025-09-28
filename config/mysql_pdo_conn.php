<?php

require_once dirname(__DIR__) . '/config/CONSTANTS.php';

try {
    $pdo = new PDO(MYSQL_DSN, DB_USER, DB_PASSWORD);
} catch (PDOException $e) {
    echo "MySQL orqali ulanishda xatolik: " . $e->getMessage();
}