<?php
/**
 * Foydalanuvchi: User
 * Loyiha nomi: yangiliklar.uz
 * Fayl nomi: news.php
 * Fayl yaratilgan: 04.11.2025 8:21
 * Maqsad: yangiliklar bilan ishlovchi model
 */

/**
 * @return array
 * oxirgi 3 ta yangilikni oluvchi funksiya
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
               -- `N`.`body` AS `yangilik_matni`,
                `N`.`seen_count` AS `kurishlar_soni`,
                DATETIME(`N`.`created_at`, 'localtime') AS `yaratilgan_vaqti`  -- device localtime da vaqtni ko'rsatish
                -- `N`.`created_at` AS `yaratilgan_vaqti`      -- GMT+5 da ko'rsatish
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

/**
 * @return array
 * bsrcha yangiliklarni oluvchi funksiya
 */
function getAllNews(): array
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
                DATETIME(`N`.`created_at`, 'localtime') AS `yaratilgan_vaqti`  -- device localtime da vaqtni ko'rsatish
                -- `N`.`created_at` AS `yaratilgan_vaqti`      -- GMT+5 da ko'rsatish
            FROM `news` AS `N`
            JOIN `category` AS `C`
             ON `N`.`category_id` = `C`.`id`
            JOIN `author` AS `A`
            ON `N`.`author_id` = `A`.`id`
            WHERE `N`.`status` = " . ACTIVE .
        " ORDER BY `yaratilgan_vaqti` DESC
            ";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    try {
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        dd($e->getMessage());
    }
}

/**
 * @return array
 * bannerda turuvchi yangiliklarni oluvchi funksiya
 */
function getBannerNews(): array
{
    global $pdo;

    $sql = "SELECT 
                `N`.`id` AS `news_id`,
                `A`.`name` AS `muallif`, 
                `N`.`title` AS `sarlavha`,
                `C`.`name` AS `kategoriya`,
                `N`.`image` AS `rasm`,
                `N`.`seen_count` AS `kurishlar_soni`,
                DATETIME(`N`.`created_at`, 'localtime') AS `yaratilgan_vaqti`  -- device localtime da vaqtni ko'rsatish
                -- DATETIME(`N`.`created_at`, '+5 hours') AS `yaratilgan_vaqti`      -- GMT+5 da ko'rsatish
            FROM `news` AS `N`
            JOIN `category` AS `C`
             ON `N`.`category_id` = `C`.`id`
            JOIN `author` AS `A`
            ON `N`.`author_id` = `A`.`id`
            WHERE `N`.`status` = " . ACTIVE .
        " ORDER BY `yaratilgan_vaqti` DESC
            LIMIT 7";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * @param int $id
 * @return array
 * id bo'yicha yangiliklarni oluvchi funksiya
 */
function getNewsById(int $id): array
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
                DATETIME(`N`.`created_at`, 'localtime') AS `yaratilgan_vaqti`  -- device localtime da vaqtni ko'rsatish
            FROM `news` AS `N`
            LEFT JOIN `category` AS `C`
             ON `N`.`category_id` = `C`.`id` AND `C`.`status` = " . ACTIVE . "
            JOIN `author` AS `A`
            ON `N`.`author_id` = `A`.`id`
            WHERE `N`.`status` = " . ACTIVE .
        " AND `N`.`id` = :id " .
        " LIMIT 1 ; ";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}


/**
 * @return array
 * barcha yangiliklar id larini oluvchi funksiya
 */
function getAllNewsIds(): array
{
    global $pdo;

    $stmt = $pdo->query("SELECT `id` FROM `news` ORDER BY `id`");
    return $stmt->fetchAll(PDO::FETCH_COLUMN);
}

/**
 * @param $id
 * @return bool|void
 * @val seen_count - ko'rishlar sonini increment qiluvchi fuksiya
 */
function updateCount($id)
{
    global $pdo;

    $sql = "UPDATE `news` 
    SET `seen_count` = `seen_count` + 1 
    WHERE `id` = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    try {
        return $stmt->execute();
    } catch (PDOException $e) {
        dd($e->getMessage());
    }
}


/**
 * @return array
 * eng ko'p ko'rilgan yangiliklarni 6 tadan chiqarish
 */
function popularNews(): array
{
    global $pdo;

    $sql = "SELECT 
                `N`.`id` AS `news_id`,
                `A`.`name` AS `muallif`, 
                `N`.`title` AS `sarlavha`,
                `N`.`description` AS `qisqa_tavsif`,
                `C`.`name` AS `kategoriya`,
                `N`.`image` AS `rasm`,
               -- `N`.`body` AS `yangilik_matni`,
                `N`.`seen_count` AS `kurishlar_soni`,
                DATETIME(`N`.`created_at`, 'localtime') AS `yaratilgan_vaqti`  -- device localtime da vaqtni ko'rsatish 
               -- , `N`.`created_at` AS `yaratilgan_vaqti`      -- GMT+5 da ko'rsatish
            FROM `news` AS `N`
            JOIN `category` AS `C`
             ON `N`.`category_id` = `C`.`id`
            JOIN `author` AS `A`
            ON `N`.`author_id` = `A`.`id`
            WHERE `N`.`status` = " . ACTIVE .
        " ORDER BY `seen_count` DESC
            LIMIT 6";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    try {
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        dd($e->getMessage());
    }
}

/**
 * @param int $page - joriy sahifa
 * @param int $perPage - har sahifada nechta yangilik
 * @return array - yangiliklar va pagination ma'lumotlari
 * Sahifalangan ommabop yangiliklar
 */
function getpaginatedPopularNews(int $page = 1, int $perPage = 6): array
{
    global $pdo;

    $page = max(1, $page);  // kamida 1 bo'lishi kerak
    $offset = ($page - 1) * $perPage;

    //    umumiy yangiliklar sonini olish
    $countQuery = "SELECT COUNT(*) AS `total` FROM `news` WHERE status = " . ACTIVE;
    $countStmt = $pdo->prepare($countQuery);
    $countStmt->execute();
    $totalNews = $countStmt->fetch(PDO::FETCH_ASSOC)['total'];
    $totalPages = (int)ceil($totalNews / $perPage);

    // Sahifalangan yangiliklar
    $sql = "
            SELECT
                `N`.`id` AS `news_id`,
                `A`.`name` AS `muallif`,
                `N`.`title` AS `sarlavha`,
                `N`.`description` AS `qisqa_tavsif`,
                `C`.`name` AS `kategoriya`,
                `N`.`image` AS `rasm`,
                `N`.`seen_count` AS `kurishlar_soni`,
                DATETIME(`N`.`created_at`, 'localtime') AS `yaratilgan_vaqti`
                FROM `news` AS `N`
            JOIN `category` AS `C`
            ON `N`.`category_id` = `C`.`id`
            JOIN `author` AS `A`
            ON `N`.`author_id` = `A`.`id`
            WHERE `N`.`status` = " . ACTIVE . "
            ORDER BY `seen_count` DESC
            LIMIT :limit OFFSET :offset;
    ";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':limit', $perPage, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();

    return [
        'news' => $stmt->fetchAll(PDO::FETCH_ASSOC),
        'currentPage' => $page,
        'totalPages' => $totalPages,
        'totalNews' => $totalNews,
        'perPage' => $perPage
        ];
}
