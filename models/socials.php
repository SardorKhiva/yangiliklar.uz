<?php
/**
 * Foydalanuvchi: User
 * Loyiha nomi: yangiliklar.uz
 * Fayl nomi: socials.php
 * Fayl yaratilgan: 03.11.2025 16:58
 * Maqsad: SQLite bazadagi ijtimoiy tarmoqlar jadvali - social dan ma'lumotlar oluvchi skript
 */

function getSocials(): array
{
    global $pdo;

    $sql = "SELECT 
                `name`,
                `url`,
                `icon_class`,
                `position`
        FROM `social`
        WHERE `status` = " . ACTIVE .
        " ORDER BY `position`";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}