<?php
/**
 * Foydalanuvchi: User
 * Loyiha nomi: yangiliklar.uz
 * Fayl nomi: authors.php
 * Fayl yaratilgan: 22.11.2025 10:12
 * Maqsad:
 */

function getAllAuthors(): array
{
    global $pdo;

    $sql = "SELECT * 
            FROM `author` 
            ORDER BY `author`.`id`";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        dd($e);
    }
}