<?php
require_once __DIR__ . '/../config/CONSTANTS.php'; // constantalar va yo'llar

/**
 * Yangiliklar kategoriyalarini bazadan olib beradi
 * @return array
 */
function getCategories(): array
{
    global $pdo;
    $sql = "SELECT 
                `name`
            FROM 
                `category`
            WHERE `status` = " . ACTIVE;
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}