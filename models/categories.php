<?php
/**
 * Foydalanuvchi: User
 * Loyiha nomi: yangiliklar.uz
 * Fayl nomi: categories.php
 * Fayl yaratilgan: 04.11.2025 16:23
 * Maqsad: yangiliklar kategoriyalarini olib beruvchi model
 */

function getCategories(): array
{
    global $pdo;
    $sql = "SELECT 
                `name`
            FROM `category`
            WHERE `status` = " . ACTIVE . "
            ORDER BY `id`
            ";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}