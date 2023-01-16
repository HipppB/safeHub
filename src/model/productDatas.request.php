<?php
require_once 'connectDb.php';

$db = connectDb();

function retrieveProductDatasByType($type, $productId){
    global $db;
    $query = $db->prepare('SELECT * FROM metrics INNER JOIN types ON metrics.id_type = types.id WHERE types.type_name = :type AND metrics.id_product = :productId');
    try {
        $query->execute([
            'type' => $type,
            'productId' => $productId
        ]);
        return $query->fetchAll();
    } catch (PDOException $e) {
        return $e->getMessage();
    }
}
