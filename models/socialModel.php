<?php
function getSocialMediaItems()
{
    global $pdo;
    $sql = "SELECT *
     FROM `social`
     WHERE `status` = " . ACTIVE .
        " ORDER BY `position`";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}