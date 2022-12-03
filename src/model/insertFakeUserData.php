<?php
//connect to db and insert fake data
require 'connectDb.php';
$db = connectDb();
//deletes existing users and insert fake users
$queryAddUser = $db->prepare("INSERT INTO users 
    (`name`, `lastname`, `password`, `email`, `phone`, `birth_date`, `is_admin`) 
    VALUES (:name, :lastname, :password, :email, :phone, :birth_date, :is_admin)");

$queryDeleteAllUser = $db->prepare('DELETE FROM users');
echo 'request prepared' . '<br>';
$queryDeleteAllUser->execute();
$queryAddUser->execute([
    'email' => 'admin@test.com',
    'password' => password_hash($_ENV['PASS'], PASSWORD_DEFAULT),
    'name' => 'admin',
    'lastname' => 'admin',
    'phone' => '0000000000',
    'birth_date' => '2022-12-06',
    'is_admin' => '1',
]);

$queryAddUser->execute([
    'email' => 'user@test.com',
    'password' => password_hash($_ENV['PASS'], PASSWORD_DEFAULT),
    'name' => 'user',
    'lastname' => 'user',
    'phone' => '0000000000',
    'birth_date' => '2022-12-06',
    'is_admin' => '0',
]);

echo 'Fake users inserted' . '<br>';

// create fake products

$queryAddProduct = $db->prepare("INSERT INTO products
    (`product_name`, `room_name`, `house_name`, `product_code`, `user_code`, `expiration_date`, `db_max`, `temp_max`) 
    VALUES (:product_name, :room_name, :house_name, :product_code, :user_code, :expiration_date, :db_max, :temp_max)");
$queryDeleteAllProducts = $db->prepare('DELETE FROM products');
$queryDeleteAllProducts->execute();

try {
    $queryAddProduct->execute([
        'product_name' => 'produit magnifique',
        'room_name' => 'salon',
        'house_name' => 'maison 1',
        'product_code' => 'NDIJQDQZZQ',
        'user_code' => 'HEGJ',
        'expiration_date' => '2022-12-06',
        'db_max' => '0',
        'temp_max' => '0',
    ]);
} catch (PDOException $e) {
    echo $e->getMessage();
}
echo 'Fake products created';

// roles
$queryAddRoles = $db->prepare("INSERT INTO roles
    (`id`, `role_name`) 
    VALUES (:id, :name)");
try {
    $queryAddRoles->execute([
        'id' => '1',
        'name' => 'admin',
    ]);
} catch (PDOException $e) {
    echo $e->getMessage();
}

try {
    $queryAddRoles->execute([
        'id' => '2',
        'name' => 'user',
    ]);
} catch (PDOException $e) {
    echo $e->getMessage();
}
