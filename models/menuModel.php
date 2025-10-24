<?php
require_once __DIR__ . '/../config/CONSTANTS.php';
require_once SQLITE_PDO_CONN; // sqlite ga ulanish

function getMenuItems()
{
    global $pdo;    // pdo obyekti

    $sql = 'SELECT *                                -- barcha ustunlarni tanlash  
            FROM `menu`                 --  menu jadvalidan
            WHERE `status` = ' . ACTIVE .    // qaysiki statuslari aktiv bo'lganlarini
        " ORDER BY `position`";                 // va pozitsiyani saralash tartibida chiqar
    $stmt = $pdo->prepare($sql);                    // $sql ni qayta ishla
    $stmt->execute();                               // $stmt ni bajar
    return $stmt->fetchAll(PDO::FETCH_ASSOC); // natijani assotsiativ massiv sifatida yubor

}
//getMenuItems();