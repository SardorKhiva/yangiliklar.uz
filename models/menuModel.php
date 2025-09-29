<?php
// menu elementlari haqidagi ma'lumotlarni o'zida saqlovchi sqlite bazadagi menu jadvalidan ma'lumot oluvchi fayl
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