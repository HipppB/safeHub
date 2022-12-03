<?php
// In this file all request for the user table
require_once 'connectDb.php';
$db = connectDb();

function getProductById($product_id)
{
    global $db;
    $query = $db->prepare('SELECT * FROM products WHERE id = :id');
    $query->execute([
        'id' => $product_id,
    ]);
    return $query->fetch();
}
function getProductByCode($product_code)
{
    global $db;
    $query = $db->prepare(
        'SELECT * FROM products WHERE product_code = :product_code'
    );
    $query->execute([
        'product_code' => $product_code,
    ]);
    return $query->fetch();
}
function addProductToUserWithUserCode($user_code, $user_id)
{
    global $db;
    $query = $db->prepare(
        'SELECT * FROM products WHERE user_code = :user_code'
    );
    $query->execute([
        'user_code' => $user_code,
    ]);
    $products = $query->fetchAll();
    foreach ($products as $product) {
        $query = $db->prepare(
            'INSERT INTO products_users (id_user, id_product, id_role,date) VALUES (:id_user, :id_product, :id_role, :date)'
        );
        $query->execute([
            'id_user' => $user_id,
            'id_product' => $product['id'],
            'id_role' => 2,
            'date' => '2022-12-06', //Expiration date... To be changed to depend on user code
        ]);
    }

    return $products;
}
