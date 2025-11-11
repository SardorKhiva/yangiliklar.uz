<?php
/**
 * Foydalanuvchi: User
 * Loyiha nomi: yangiliklar.uz
 * Fayl nomi: menu.php
 * Fayl yaratilgan: 03.11.2025 15:59
 * Maqsad: SQLite bazadan menu ma\lumotlarini olib beruvchi model
 */

/**
 * Faol (aktiv) holatdagi menyularni `menu` jadvalidan olib keladi.
 *
 * Ushbu funksiya `menu` jadvalidan faqat `status` ustuni `ACTIVE`
 * konstantasiga teng bo‘lgan (ya’ni faol) yozuvlarni tanlaydi.
 * Natijalar `position` ustuni bo‘yicha o‘sish tartibida qaytariladi.
 *
 * `ACTIVE` konstantasi odatda `1` qiymatini bildiradi.
 *
 * Har bir menyu yozuvi assotsiativ massiv sifatida qaytariladi, masalan:
 * [
 *     ['id' => 1, 'name' => 'Bosh sahifa', 'url' => '/', 'status' => 1, 'position' => 1],
 *     ['id' => 2, 'name' => 'Yangiliklar', 'url' => '/news', 'status' => 1, 'position' => 2],
 *     ...
 * ]
 *
 * @return array Faol menyular ro‘yxati (`status = ACTIVE` bo‘lgan yozuvlar).
 *
 * @throws PDOException Agar so‘rov bajarilishida xato yuz bersa.
 */
function getActiveMenus(): array
{
    global $pdo;

    $sql = "
            SELECT
                *
            FROM `menu`
            WHERE `status` = " . ACTIVE .
        " ORDER BY `position`";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * `menu` jadvalidagi barcha menyu yozuvlarini qaytaradi.
 *
 * Ushbu funksiya ma'lumotlar bazasidagi `menu` jadvalidan
 * barcha yozuvlarni olib keladi va ularni `position` ustuni bo‘yicha tartiblaydi.
 *
 * Har bir menyu elementi assotsiativ massiv shaklida qaytariladi.
 * Masalan:
 * [
 *     ['id' => 1, 'name' => 'Bosh sahifa', 'url' => '/', 'status' => 1, 'position' => 1],
 *     ['id' => 2, 'name' => 'Yangiliklar', 'url' => '/news', 'status' => 1, 'position' => 2],
 *     ...
 * ]
 *
 * @return array Barcha menyular ro‘yxati (har biri assotsiativ massiv sifatida).
 *
 * @throws PDOException Agar so‘rov bajarilishida xato yuz bersa.
 */
function getAllMenus(): array
{
    global $pdo;

    $sql = "SELECT * 
            FROM `menu`
            ORDER BY `position`;";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    try {
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        dd($e->getMessage());
    }
}

/**
 * Yangi menyu yozuvini `menu` jadvaliga qo'shadi.
 *
 * Ushbu funksiya `menu` jadvaliga yangi satr qo'shadi.
 * Parametrlar `PDO` orqali tayyorlangan so‘rov (prepared statement)
 * yordamida xavfsiz tarzda bog‘lanadi (SQL Injection dan himoya qiladi).
 *
 * @param string $name Menyu nomi (masalan, "Bosh sahifa").
 * @param int $position Menyuning tartib raqami (chiqish tartibini belgilaydi).
 * @param string $url Menyu havolasi (masalan, "/about" yoki "https://site.uz").
 * @param int $status Menyu holati (1 — faol, 0 — nofaol).
 *
 * @return bool True — agar yozuv muvaffaqiyatli qo‘shilsa, false — xatolik yuz bersa.
 *
 * @throws PDOException Agar ma'lumotlar bazasiga yozishda xato bo‘lsa.
 */
function menuCreate(string $name, int $position, string $url, int $status): bool
{
    global $pdo;

    $sql = "INSERT INTO `menu` (`name`, `position`, `url`, `status`)
            VALUES (:name, :position, :url, :status);";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':position', $position, PDO::PARAM_INT);
    $stmt->bindParam(':url', $url, PDO::PARAM_STR);
    $stmt->bindParam(':status', $status, PDO::PARAM_INT);

    try {
        return $stmt->execute();
    } catch (PDOException $e) {
        dd($e->getMessage());
        return false;
    }
}

function menuExists(string $name, string $url): bool
{
    global $pdo;
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM menu WHERE name = :name OR url = :url");
    $stmt->execute([':name' => $name, ':url' => $url]);
    return $stmt->fetchColumn() > 0;
}

function positionExists(int $position): bool
{
    global $pdo;
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM menu WHERE position = :position");
    $stmt->execute([':position' => $position]);
    return $stmt->fetchColumn() > 0;
}

function getMenuById(int $id): array
{
    global $pdo;
    $sql = "SELECT * FROM `menu` WHERE `id` = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    try {
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        dd($e->getMessage());
    }
}

function isSetMenuID(int $id): bool
{
    global $pdo;
    $sql = "SELECT COUNT(*) FROM `menu` WHERE `id` = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    return $stmt->fetchColumn() > 0;
}