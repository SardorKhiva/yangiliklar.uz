<?php
//D:\exe\OSPanel_5_4_3\domains\yangiliklar.uz\models\categories.php
/*
function isExists(string $name): bool
{
    global $pdo;

    $sql = "SELECT COUNT(*) FROM `category` 
            WHERE `name` = :name";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':name', $name);
    try {
        return $stmt->execute();
    } catch (PDOException $e) {
        dd($e->getMessage());
    }
}
*/

function getCategories(): array
{
    global $pdo;
    $sql = "SELECT 
                `name`
            FROM `category`
            WHERE `status` = :status
            ORDER BY `id`
            ";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['status' => ACTIVE]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("DB xatolik, getCategories():" . $e->getMessage());
        return [];
    }
}

function getAllCategories(): array
{
    global $pdo;

    $sql = "SELECT * FROM `category`
    ORDER BY `id`";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        dd($e->getMessage());
    }
}

function categoryDelete(int $id): bool
{
    global $pdo;

    $sql = "DELETE FROM `category` WHERE `id` = :id";
    try {

        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->rowCount() === 1;
    } catch (PDOException $e) {
        dd("Xatolik: <br>" . $e);
    }
}

function categoryNameExists(string $name, int $id = 0): bool
{
    global $pdo;

    $sql = "SELECT COUNT(*) as count
            FROM `category`
            WHERE `name` = :name
            AND `id` != :id";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':name' => $name, ':id' => $id]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'] > 0;
    } catch (PDOException $e) {
        // Xatolikni log qilish yoki ko'rsatish
        error_log("Database error: " . $e->getMessage());
        return false;
    }
}

function categoryCreate(string $name, int $status): bool
{
    global $pdo;
    $sql = "INSERT INTO `category` (`name`, `status`) VALUES (:name, :status)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':name' => $name, ':status' => $status]);
    try {
        return $stmt->rowCount() === 1;
    } catch (PDOException $e) {
        dd("Xatolik: <br>" . $e);
    }
}

function getCategoryByID(int $id): ?array
{
    global $pdo;

    $sql = "SELECT * FROM `category` WHERE `id` = :id";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        dd("Xatolik: <br>" . $e);
    }
}

function categoryUpdate(int $id, string $name, int $status): bool
{
    global $pdo;
    $sql = "UPDATE `category` 
            SET
                `name`   = :name,
                `status` = :status
            WHERE `id`   = :id;";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':name' => $name, ':status' => $status, ':id' => $id]);
        return $stmt->rowCount() >= 0;
    } catch (PDOException $e) {
        dd("Xatolik: <br>" . $e);
    }
}