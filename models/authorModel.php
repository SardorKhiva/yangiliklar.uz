<?php

function getAuthors()
{
    global $pdo;

    $sql = "SELECT 
                `id`,
                `name`
            FROM 
                `author`";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}