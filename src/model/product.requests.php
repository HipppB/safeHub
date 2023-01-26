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

    $querydb = $db->prepare(
        'SELECT COUNT(*) FROM products_users WHERE id_user = :id_user AND id_product = :id_product'
    );
    $query = $db->prepare(
        'INSERT INTO products_users (id_user, id_product, date) VALUES (:id_user, :id_product, :date)'
    );
    $productAdded = 0;
    foreach ($products as $product) {
        // check if user has already this product

        $querydb->execute([
            'id_user' => $user_id,
            'id_product' => $product['id'],
        ]);

        $productUser = $querydb->fetch();
        // check if user has already this product

        if ($productUser[0] == '0') {
            $query->execute([
                'id_user' => $user_id,
                'id_product' => $product['id'],
                'date' => '2022-12-06', //Expiration date... To be changed to depend on user code
            ]);
            $productAdded++;
        }
    }

    return $productAdded;
}

function getUserProducts($user_id)
{
    global $db;
    $query = $db->prepare("SELECT * 
    FROM products_users 
    INNER JOIN products ON products_users.id_product = products.id WHERE id_user = :userId");
    $query->execute([
        'userId' => $user_id,
    ]);
    $products = $query->fetchAll();
    if (!userIsAdmin() && !($user_id === $_SESSION['user']['id'])) {
        // If here, the user is not admin and is not the user himself, it means he is gestionnaire
        // We need to filter the products to only show the ones where he is gestionnaire
        // Get all products where the user is gestionnaire

        $query = $db->prepare(
            'SELECT * FROM products_users 
            INNER JOIN products ON products_users.id_product = products.id 
            WHERE id_user = :userId AND gestionnaire = 1'
        );
        $query->execute([
            'userId' => $_SESSION['user']['id'],
        ]);

        $gestionnaireProducts = $query->fetchAll();
        // Get all products common to the user and the gestionnaire
        $products = array_intersect($products, $gestionnaireProducts);
    }

    return $products;
}

function getProducts()
{
    // If the user is admin we return all products
    if (userIsAdmin()) {
        global $db;
        $query = $db->prepare('SELECT * FROM products');
        $query->execute();
        return $query->fetchAll();
    }
    return getUserProducts($_SESSION['user']['id']);
}

function getUsersOfProducts($product_id)
{
    global $db;
    // $query = $db->prepare(
    //     'SELECT * FROM products_users WHERE id_product = :id_product'
    // );
    // $query->execute([
    //     'id_product' => $product_id,
    // ]);
    // get user data
    $query = $db->prepare(
        'SELECT * FROM products_users 
        INNER JOIN users ON products_users.id_user = users.id 
        WHERE id_product = :id_product'
    );
    $query->execute([
        'id_product' => $product_id,
    ]);
    return $query->fetchAll();
}

function createProduct($productName, $roomName, $houseName, $productCode, $userCode, $expirationDate, $comments){
    $productExists = getProductByCode($productCode);
    if($productExists){
        return 'productAlreadyExists';
    }
    global $db;
    $query = $db->prepare(
        'INSERT INTO products (product_name, room_name, house_name, product_code, user_code, expiration_date, comments) VALUES (:productName, :roomName, :houseName, :productCode, :userCode, :expirationDate, :comments)'
    );
    try {
        $query->execute([
            'productName'=> $productName,
            'roomName' => $roomName,
            'houseName' => $houseName,
            'productCode' => $productCode,
            'userCode' => $userCode,
            'expirationDate' => $expirationDate,
            'comments' => $comments
        ]);
        return true;
    }catch (PDOExeption $E) {
        return false;
    }
}

function updateProduct($productName, $roomName, $houseName, $productCode, $userCode, $expirationDate, $comments, $id){
    global $db;
    $query = $db->prepare(
        'UPDATE products SET product_name = :productName, room_name = :roomName, house_name = :houseName, product_code = :productCode, user_code = :userCode, expiration_date = :expirationDate, comments = :comments WHERE id=:id'
    );
    try {
        $query->execute([
            'productName'=> $productName,
            'roomName' => $roomName,
            'houseName' => $houseName,
            'productCode' => $productCode,
            'userCode' => $userCode,
            'expirationDate' => $expirationDate,
            'comments' => $comments,
            'id' => $id
        ]);
        return true;
    }catch (PDOExeption $E) {
        return false;
    }
}

function deleteProduct($productId){
    global $db;
    $query = $db-> prepare('DELETE FROM products WHERE id = :id');

    try {
        $query->execute([
            'id'=> $productId
        ]);
        return true;
    }catch (PDOException $e) {
        return false;
    }
}
