<?php
/**
 * Foydalanuvchi: User
 * Loyiha nomi: yangiliklar.uz
 * Fayl nomi: news.php
 * Fayl yaratilgan: 04.11.2025 8:21
 * Maqsad: yangiliklar bilan ishlovchi model
 */

function getLastNews(): array
{
    global $pdo;

    $sql = "SELECT 
                `N`.`id` AS `news_id`,
                `A`.`name` AS `muallif`, 
                `N`.`title` AS `sarlavha`,
                `N`.`description` AS `qisqa_tavsif`,
                `C`.`name` AS `kategoriya`,
                `N`.`image` AS `rasm`,
                `N`.`body` AS `yangilik_matni`,
                `N`.`seen_count` AS `kurishlar_soni`,
                DATETIME(`N`.`create_at`, '+5 hours') AS `yaratilgan_vaqti`      -- GMT+5 da ko'rsatish
            FROM `news` AS `N`
            JOIN `category` AS `C`
             ON `N`.`category_id` = `C`.`id`
            JOIN `author` AS `A`
            ON `N`.`author_id` = `A`.`id`
            WHERE `N`.`status` = " . ACTIVE .
            " ORDER BY `yaratilgan_vaqti` DESC
            LIMIT 3";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}