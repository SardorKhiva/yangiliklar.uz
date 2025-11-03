<?php
/**
 * Foydalanuvchi: User
 * Loyiha nomi: yangiliklar.uz
 * Fayl nomi: menu.php
 * Fayl yaratilgan: 03.11.2025 15:59
 * Maqsad: SQLite bazadan menu ma\lumotlarini olib beruvchi model
 */


function getMenus(): array
{
    global $pdo;

    $sql = "
            SELECT 
                 `name`,
                 `position`,
                 `url`
            FROM `menu`
            WHERE `status` = " . ACTIVE .
        " ORDER BY `position`";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}