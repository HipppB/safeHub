<?php
require_once 'connectDb.php';

$db = connectDb();

function retrieveProductDatasByType($type){
    global $db;
    $query = $db->prepare('SELECT * FROM metrics INNER JOIN types ON metrics.id_type = types.id WHERE types.type_name = :type');
    try {
        $query->execute([
            'type' => $type,
        ]);
        return $query->fetchAll();
    } catch (PDOException $e) {
        return $e->getMessage();
    }
}
