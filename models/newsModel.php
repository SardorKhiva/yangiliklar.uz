<?php
/**
 * Oxirgi 3 ta yangiliklarni qaytaruvchi funksiya
 * @return array
 * @author leaderkhiva
 *
 */
function getLastNews(): array
{
    global $pdo;
    $sql = "SELECT 
            `theme_id`,
            `title`,
            `author_id`,
            `seen_count`,
            `created_at`,
            `description`,
            `content`
            FROM `news`
            WHERE `status` = " . ACTIVE .
          " ORDER BY `created_at` DESC
            LIMIT 3";

    $pre = $pdo->prepare($sql);
    $pre->execute();
    return $pre->fetchAll(PDO::FETCH_ASSOC);
}

getLastNews();