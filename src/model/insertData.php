<?php
// insertData.php

/** @var PDO $db */
/**    @var array $translations
 */
//deletes existing users and insert fake users

// Not useful if you use the dropDb.php script
//$queryDeleteAllUser = $db->prepare('DELETE FROM users');
//$queryDeleteAllProducts = $db->prepare('DELETE FROM products');
//$queryDeleteAllProducts->execute();
//$queryDeleteAllUser->execute();

$queryAddUser = $db->prepare("INSERT INTO users 
    (`name`, `lastname`, `password`, `email`, `phone`, `birth_date`, `is_admin`) 
    VALUES (:name, :lastname, :password, :email, :phone, :birth_date, :is_admin)");

try {
    $queryAddUser->execute([
        'email' => 'admin@test.com',
        'password' => password_hash($_ENV['PASS'], PASSWORD_DEFAULT),
        'name' => 'admin',
        'lastname' => 'admin',
        'phone' => null,
        'birth_date' => '2001-12-06',
        'is_admin' => '1',
    ]);
    $queryAddUser->execute([
        'email' => 'user@test.com',
        'password' => password_hash($_ENV['PASS'], PASSWORD_DEFAULT),
        'name' => 'user',
        'lastname' => 'user',
        'phone' => '+33 6 78 90 12 34',
        'birth_date' => '2002-12-06',
        'is_admin' => '0',
    ]);
    echo 'Fake users inserted' . PHP_EOL;
}catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage() . PHP_EOL;
}



// create fake products

$queryAddProduct = $db->prepare("INSERT INTO products
    (`product_name`, `room_name`, `house_name`, `product_code`, `user_code`, `expiration_date`, `db_max`, `temp_max`) 
    VALUES (:product_name, :room_name, :house_name, :product_code, :user_code, :expiration_date, :db_max, :temp_max)");

try {
    $queryAddProduct->execute([
        'product_name' => 'Produit magnifique',
        'room_name' => 'salon',
        'house_name' => 'Maison 1',
        'product_code' => 'NDIJQDQZZQ',
        'user_code' => 'HEGJ',
        'expiration_date' => '2023-12-06',
        'db_max' => '0',
        'temp_max' => '0',
    ]);
    $queryAddProduct->execute([
        'product_name' => 'Produit horrible',
        'room_name' => 'Salle à manger',
        'house_name' => 'Maison 1',
        'product_code' => 'DZKKOLPDLZQ',
        'user_code' => 'HEGJ',
        'expiration_date' => '2023-12-06',
        'db_max' => '0',
        'temp_max' => '0',
    ]);
    $queryAddProduct->execute([
        'product_name' => 'Produit horrible',
        'room_name' => 'Salle à manger',
        'house_name' => 'Maison 1',
        'product_code' => 'DUKKOLPDLZQ',
        'user_code' => 'HEGH',
        'expiration_date' => '2023-12-06',
        'db_max' => '0',
        'temp_max' => '0',
    ]);
    echo 'Fake products created' . PHP_EOL;
} catch (PDOException $e) {
    echo $e->getMessage() . PHP_EOL;
}

// roles
$queryAddRoles = $db->prepare("INSERT INTO roles
    (`id`, `role_name`) 
    VALUES (:id, :name)");
try {
    $queryAddRoles->execute([
        'id' => '1',
        'name' => 'admin',
    ]);
    $queryAddRoles->execute([
        'id' => '2',
        'name' => 'user',
    ]);
    echo 'Fake roles created' . PHP_EOL;
} catch (PDOException $e) {
    echo $e->getMessage() . PHP_EOL;
}

// Import translations from json file

$queryAddTranslation = $db->prepare("INSERT INTO translations
    (`key`, `lang`, `value`) 
    VALUES (:key, :lang, :value)");

try {
    foreach ($translations as $key => $value) {
        foreach ($value as $lang => $translation) {
            $queryAddTranslation->execute([
                'key' => $key,
                'lang' => $lang,
                'value' => $translation,
            ]);
        }
    }
    echo 'Fake translations created' . PHP_EOL;
}catch (PDOException $e) {
    echo $e->getMessage() . PHP_EOL;
}
// not useful ???
//$translations = json_decode(file_get_contents('translations.json'), true);
//$queryAddTranslation = $db->prepare("INSERT INTO translations
//    (`key`, `lang`, `value`)
//    VALUES (:key, :lang, :value)");
//foreach ($translations as $key => $value) {
//    foreach ($value as $lang => $translation) {
//        $queryAddTranslation->execute([
//            'key' => $key,
//            'lang' => $lang,
//            'value' => $translation,
//        ]);
//    }
//}

$queryAddTips = $db->prepare("INSERT INTO tips
    (`id`, `content`) 
    VALUES (:id, :content)");

try {
    $queryAddTips->execute([
        'id' => '3',
        'content' =>
            'Ceci est un test de conseil tres tres tres tres long parce que je veux tester le css',
    ]);
    $queryAddTips->execute([
        'id' => '4',
        'content' =>
            'Ceci est un test de conseil tres tres tres tres long parce que je veux tester le css',
    ]);
    $queryAddTips->execute([
        'id' => '5',
        'content' =>
            'Ceci est un test de conseil tres tres tres tres long parce que je veux tester le css',
    ]);
    echo 'Fake tips created' . PHP_EOL;
} catch (PDOException $e) {
    echo $e->getMessage() . PHP_EOL;
}
// insert fake data types and fake datas

$queryAddMetricsTypes = $db->prepare("INSERT INTO types
    (`type_name`) 
    VALUES (:name)");

try {
    $queryAddMetricsTypes->execute([
        'name' => 'temperature',
    ]);
    $queryAddMetricsTypes->execute([
        'name' => 'humidity',
    ]);
    $queryAddMetricsTypes->execute([
        'name' => 'carbon_dioxide',
    ]);
    $queryAddMetricsTypes->execute([
        'name' => 'sound_level',
    ]);

    echo 'Fake data types created' . PHP_EOL;



} catch (PDOException $e) {
    echo $e->getMessage() . PHP_EOL;
}


$queryAddMetrics = $db->prepare("INSERT INTO metrics (`id`, `id_product`, `id_type`, `data`, `date`) VALUES (:id, :id_product, :type_id, :value, :date)");
$getProducts = $db->prepare('SELECT * FROM products');
$getTypes = $db->prepare('SELECT * FROM types');

try {
    $getProducts->execute();
    $products = $getProducts->fetchAll();
    $getTypes->execute();
    $types = $getTypes->fetchAll();
    $i = 1;
    while ($i < 100) {
        $timestamp = strtotime("2023-01-14 12:47:14")+(60*60*$i);
        $date = new DateTime();
        $date->setTimestamp($timestamp);
        $queryAddMetrics->execute([
            'id' => $i,
            'id_product' => $products[0]['id'],
            'type_id' => $types[0]['id'],
            'value' => rand(0, 100),
            'date' => $date->format('Y-m-d H:i:s'),
        ]);
        $queryAddMetrics->execute([
            'id' => $i + 1,
            'id_product' => $products[0]['id'],
            'type_id' => $types[1]['id'],
            'value' => rand(0, 100),
            'date' => $date->format('Y-m-d H:i:s'),
        ]);
        $queryAddMetrics->execute([
            'id' => $i + 2,
            'id_product' => $products[0]['id'],
            'type_id' => $types[2]['id'],
            'value' => rand(0, 100),
            'date' => $date->format('Y-m-d H:i:s'),
        ]);
        $queryAddMetrics->execute([
            'id' => $i + 3,
            'id_product' => $products[0]['id'],
            'type_id' => $types[3]['id'],
            'value' => rand(0, 100),
            'date' => $date->format('Y-m-d H:i:s'),
        ]);
        $i += 4;
    }
    echo 'Fake metrics created' . PHP_EOL;
} catch (PDOException $e) {
    echo $e->getMessage()   . PHP_EOL;
}

