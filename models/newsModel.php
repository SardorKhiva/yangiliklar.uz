<?php
/**
 * Yangiliklar jadvalidan oxirgi 3 ta aktiv yangilikni tanlab oluvchi funksiya.
 *
 * Tanlangan yangiliklar ma'lumotlari bilan birga,
 * tegishli muallifning nomi va kategoriya nomi ham qo'shib qaytariladi.
 *
 * @global PDO $pdo Global miqyosda e'lon qilingan PDO ulanish obyekti.
 * @return array Assotsiativ massiv (array) ko'rinishidagi yangiliklar ro'yxati.
 * @author leaderkhiva
 * @version 1.0.0
 * @since 2025-10-26
 */
function getLastNews(): array
{
    // Global o'zgaruvchi $pdo ni funksiya ichida ishlatish uchun e'lon qilish.
    // $pdo - bu ma'lumotlar bazasiga ulanish obyekti (odatda PDO sinfining instansi).
    global $pdo;

    // Ma'lumotlar bazasidan ma'lumotlarni olish uchun SQL so'rovini belgilash.
    $sql = "
       SELECT 
            `n`.`id` AS `news_id`,          -- Yangilikning asosiy identifikatori. `news` jadvalidan `news_id` nomi bilan olinadi.
            `n`.`category_id`,              -- Yangilik tegishli bo'lgan kategoriyaning ID si (yoki mavzu ID si).
            `n`.`title`,                    -- Yangilikning sarlavhasi (nomi).
            `n`.`author_id`,                -- Yangilikni yozgan muallifning ID si.
            `a`.`name` AS `author_name`,    -- `author` jadvalidan olingan muallifning to'liq ismi.
            `n`.`seen_count`,               -- Yangilikni ko'rishlar soni (hisoblagich).
            `n`.`created_at`,               -- Yangilik yozilgan va ma'lumotlar bazasiga qo'shilgan sana va vaqti.
            `n`.`description`,              -- Yangilikning qisqa mazmuni, xulosasi yoki tavsifi.
            `n`.`content`,                  -- Yangilikning to'liq matni.
            `n`.`img_url`,                  -- Yangilik rasmi (banneri) joylashgan fayl yo'li (URL).
            `c`.`name` AS `category_name`   -- `category` jadvalidan olingan yangilikning kategoriyasi nomi.
            FROM `news` AS `n`              -- SQL so'rovi uchun asosiy jadval sifatida `news` jadvali tanlanadi, unga `n` taxallusi beriladi.
            INNER JOIN `author` AS `a`      -- `news` jadvalini `author` jadvali bilan ichki bog'lash (ulanmoq). `a` taxallusi beriladi.
              ON `n`.`author_id` = `a`.`id` -- Bog'lanish sharti: Yangilikning muallif ID si muallif jadvalidagi ID ga teng bo'lsin.
            INNER JOIN `category` AS `c`    -- `news` jadvalini `category` jadvali bilan ichki bog'lash. `c` taxallusi beriladi.
              ON `n`.`category_id` = `c`.`id` -- Bog'lanish sharti: Yangilikning kategoriya ID si kategoriya jadvalidagi ID ga teng bo'lsin.
            WHERE `n`.`status` = " . ACTIVE . " -- Yangilik faqatgina aktiv holatda bo'lsin (o'chirilmagan, nashr qilingan). `ACTIVE` - konstantasi ishlatiladi.
            AND `c`.`status` = " . ACTIVE . "   -- Faqat aktiv kategoriyalarga tegishli bo'lgan yangiliklarni tanlash.
            ORDER BY `created_at` DESC          -- Natijalarni `created_at` (yaratilgan sana) ustuni bo'yicha teskari tartibda saralash. Eng yangilari birinchi keladi.
            LIMIT 3                             -- Tanlanayotgan yozuvlar sonini 3 tagacha cheklash (oxirgi 3 ta yangilik).
            ";

    // Tayyorlangan so'rovni yaratish (SQL inyeksiyasidan himoyalanish uchun).
    $pre = $pdo->prepare($sql);
    // So'rovni ma'lumotlar bazasida bajarish.
    $pre->execute();
    // Bajarilgan so'rov natijalarini assotsiativ massivlar ko'rinishida olish va qaytarish.
    // PDO::FETCH_ASSOC har bir qatorni ustun nomlari kalit bo'lgan massiv qilib beradi.
    return $pre->fetchAll(PDO::FETCH_ASSOC);
}