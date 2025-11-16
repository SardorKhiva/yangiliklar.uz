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
function getAllMenus(string $sort = 'id', string $order = 'ASC'): array
{
    global $pdo;

    $sql = "SELECT * FROM `menu` ORDER BY $sort $order;";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        dd($e->getMessage());
    }
}

function nameExists(string $name, int $id = 0): bool
{
    global $pdo;

    $stmt = $pdo->prepare("SELECT COUNT(*) FROM `menu` WHERE `name` = :name AND `id` != :id");
    $stmt->execute([':name' => $name, ':id' => $id]);

    return $stmt->fetchColumn() > 0;
}


function urlExists(string $url, int $id = 0): bool
{
    global $pdo;

    $url = trim($url);
    if ($url === '') {
        return false; // bo'sh URLni duplikat deb hisoblamaymiz
    }

    $stmt = $pdo->prepare("SELECT COUNT(*) FROM `menu` WHERE `url` = :url AND `id` != :id");
    $stmt->execute([':url' => $url, ':id' => $id]);
    return (int)$stmt->fetchColumn() > 0;
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
    }
}

/**
 * Tekshiradi: bazada shunday nom (name) yoki manzil (url) bilan menyu bor-yo'qligini aniqlovchi funksiya.
 * @param string $name -  menyu nomi ("Bosh sahifa", ...)
 * @param string $url -  menyu manzili (/home, ...)
 * @param int $excludeId - agar menyuni tahrirlanayotgan(yangilash) bo'lsa,
 *                         shu qatorni hisobga olmasin
 * Qaytaradi:
 * @return bool
 *      - true  — agar bazada shunday nom yoki URL allaqachon mavjud bo‘lsa;
 *      - false — agar yo‘q bo‘lsa (ya’ni yangi yozish mumkin bo‘lsa).
 *
 *   Ishlash mantig‘i:
 *      1. Bazadan so‘raydi: shu nom yoki shu URL mavjudmi?
 *      2. Agar $excludeId > 0 bo‘lsa (ya’ni tahrirlash rejimi),
 *         o‘sha iddagi yozuvni tekshirishdan chiqarib tashlaydi.
 *      3. Natijani hisoblab, true yoki false qaytaradi.
 *
 *    Oddiy qilib aytganda:
 *      Bu funksiya "shu menyu allaqachon bor yoki yo‘q" degan savolga javob beradi.
 * @example:
 *    - "Bosh sahifa" nomli menyu bo'lsa qo'shib bo'lmaydi
 *    - "/home" url mavjud bo'lsa qo'shib bo'lmaydi
 */
function menuExists(string $name, string $url, int $excludeId = 0): bool
{
    global $pdo;

    if ($excludeId > 0) {
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM menu 
                               WHERE (name = :name OR url = :url) 
                               AND id != :id");
        $stmt->execute([':name' => $name, ':url' => $url, ':id' => $excludeId]);
    } else {
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM menu 
                               WHERE name = :name OR url = :url");
        $stmt->execute([':name' => $name, ':url' => $url]);
    }

    return $stmt->fetchColumn() > 0;
}

/**
 * Berilgan pozitsiyada (position) menyu elementi mavjudligini tekshiradi.
 * Yangilash (UPDATE) holatida, berilgan ID'ga ega elementni tekshiruvdan chiqarib tashlaydi.
 *
 * @param int $position Tekshirilayotgan menyu pozitsiyasi.
 * @param int $excludeId Tekshiruvdan chiqarib tashlanadigan element ID'si (yangilash uchun 0 bo'lmasligi kerak).
 * @return bool Agar pozitsiya band bo'lsa true, aks holda false qaytaradi.
 */
function positionExists(int $position, int $excludeId = 0): bool
{
    global $pdo;

    // SQL so'rovi: berilgan pozitsiyaga ega, lekin ID'si excludeId'ga teng bo'lmagan yozuvlarni sanaymiz.
    $sql = "SELECT COUNT(*) FROM menu WHERE position = :position AND `id` != :excludeId";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':position' => $position,
        ':excludeId' => $excludeId
    ]);

    // Agar natija 0 dan katta bo'lsa, bu pozitsiya band degani.
    return $stmt->fetchColumn() > 0;
}

function getMenuById(int $id): ?array
{
    global $pdo;
    try {
        $sql = "SELECT * FROM `menu` WHERE `id` = :id";
        $stmt = $pdo->prepare($sql); // PDOda bitta yozuvni assotsiativ massiv sifatida olish (SELECT natijasidan). (ya’ni ustun nomlari bilan) qaytariladi.
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row !== FALSE ? $row : NULL; // row agar false bo'lmasa o'zini qaytarsin, aks holda null ni
    } catch (PDOException $e) {
        dd($e->getMessage());
    }
}

function getMaxMenuPosition(): int
{
    global $pdo;
    $sql = "SELECT MAX(`position`) FROM `menu`";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row['MAX(`position`)'];
}

function isSetMenuID(int $id): bool
{
    global $pdo;
    $sql = "SELECT COUNT(*) FROM `menu` WHERE `id` = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    return $stmt->fetchColumn() > 0;
}

/**
 * Jadvaldagi menyu yozuvini yangilaydi.
 *
 * @param int $id Yangilanishi kerak bo‘lgan menyu ID raqami.
 * @param string $name Menyu nomi (takrorlanmas bo‘lishi kerak).
 * @param int $position Menyu pozitsiyasi (takrorlanmas bo‘lishi kerak).
 * @param string $url Menyu havolasi (takrorlanmas bo‘lishi kerak).
 * @param int $status Menyu holati (0 - o‘chirilgan, 1 - faol).
 *
 * @return bool         True — muvaffaqiyatli yangilansa, false — xatolik bo‘lsa.
 */
function menuUpdate(int $id, string $name, int $position, string $url, int $status): bool
{
    global $pdo;

    try {
        // Dublikat mavjudligini tekshirish (o‘z yozuvini hisobga olmagan holda)
        $stmt = $pdo->prepare("
            SELECT COUNT(*) 
            FROM `menu` 
            WHERE (`name` = :name OR `position` = :position OR `url` = :url)
              AND `id` != :id
        ");
        $stmt->execute([
            ':name' => $name,
            ':position' => $position,
            ':url' => $url,
            ':id' => $id
        ]);

        if ($stmt->fetchColumn() > 0) {
            echo "Dublikat maydon mavjud! (nom, pozitsiya yoki URL allaqachon ishlatilgan)";
            return false;
        }

        // Agar dublikat yo‘q bo‘lsa — yozuvni yangilaymiz
        $sql = "
            UPDATE menu
            SET 
                name = :name,
                position = :position,
                url = :url,
                status = :status
            WHERE id = :id
        ";

        $stmt = $pdo->prepare($sql);
        return $stmt->execute([
            ':name' => $name,
            ':position' => $position,
            ':url' => $url,
            ':status' => $status,
            ':id' => $id
        ]);

    } catch (PDOException $e) {
        dd("Xatolik: " . $e->getMessage());
    }
}

/*
function menuUpdate(int $id, string $name, int $position, string $url, bool $status)
{
    global $pdo;

    $sql = "UPDATE `menu` 
            SET `name` = :name,
                `position` = :position,
                `url` = :url,
                `status` = :status
        WHERE `id` = :id; ";

    $stmt = $pdo->prepare($sql);

    // paraqmetrlarni bog'lash
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':position', $position, PDO::PARAM_INT);
    $stmt->bindParam(':url', $url, PDO::PARAM_STR);
    $stmt->bindParam(':status', $status, PDO::PARAM_INT);

    try {
        return $stmt->execute();
    } catch (PDOException $e) {
        dd($e->getMessage());
    }
}
*/

function menuDelete(int $id): bool
{
    global $pdo;
    try {

        $sql = "DELETE FROM `menu` WHERE `id` = :id";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([':id' => $id]);
    } catch (PDOException $e) {
        dd("Xatolik: <br>" . $e);
    }
}