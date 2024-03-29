<?php
// insertData.php

/** @var PDO $db */
/**    @var array $translations
 */

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
    $queryAddUser->execute([
        'email' => 'user2@test.com',
        'password' => password_hash($_ENV['PASS'], PASSWORD_DEFAULT),
        'name' => 'user2',
        'lastname' => 'user2',
        'phone' => '+33 9 87 93 10 14',
        'birth_date' => '1996-12-06',
        'is_admin' => '0',
    ]);
    $queryAddUser->execute([
        'email' => 'gestionnaire@test.com',
        'password' => password_hash($_ENV['PASS'], PASSWORD_DEFAULT),
        'name' => 'futur',
        'lastname' => 'gestionnaire',
        'phone' => null,
        'birth_date' => '1902-3-06',
        'is_admin' => '0',
    ]);
    echo 'Fake users inserted' . PHP_EOL;
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage() . PHP_EOL;
}

// create fake products

$queryAddProduct = $db->prepare("INSERT INTO products
    (`product_name`, `room_name`, `house_name`, `product_code`, `user_code`, `expiration_date`, `db_max`, `temp_max`) 
    VALUES (:product_name, :room_name, :house_name, :product_code, :user_code, :expiration_date, :db_max, :temp_max)");

try {
    $queryAddProduct->execute([
        'product_name' => 'Produit Magnifique',
        'room_name' => 'Garage',
        'house_name' => 'Maison 1',
        'product_code' => 'NDIJQDQZZQ',
        'user_code' => 'HEGJ',
        'expiration_date' => '2023-12-06',
        'db_max' => '0',
        'temp_max' => '0',
    ]);
    $queryAddProduct->execute([
        'product_name' => 'Produit Prodige',
        'room_name' => 'Chambre',
        'house_name' => 'Maison 1',
        'product_code' => 'DZKKOLPDLZQ',
        'user_code' => 'HEGJ',
        'expiration_date' => '2023-12-06',
        'db_max' => '0',
        'temp_max' => '0',
    ]);
    $queryAddProduct->execute([
        'product_name' => 'Produit Incroyable',
        'room_name' => 'Salle à manger',
        'house_name' => 'Maison 2',
        'product_code' => 'DUKKOLPDLZQ',
        'user_code' => 'HEGH',
        'expiration_date' => '2023-12-06',
        'db_max' => '0',
        'temp_max' => '0',
    ]);
    $queryAddProduct->execute([
        'product_name' => 'Produit Sublime',
        'room_name' => 'Salon',
        'house_name' => 'Maison 3',
        'product_code' => 'DUKKOLPELZQ',
        'user_code' => 'HEGH',
        'expiration_date' => '2023-12-06',
        'db_max' => '0',
        'temp_max' => '0',
    ]);
    echo 'Fake products created' . PHP_EOL;
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
} catch (PDOException $e) {
    echo $e->getMessage() . PHP_EOL;
}

$queryAddTips = $db->prepare("INSERT INTO tips
    (`id`, `content`) 
    VALUES (:id, :content)");

try {
    $queryAddTips->execute([
        'id' => '3',
        'content' =>
            'Utilisez des moyens de transport durables comme la marche, le vélo ou les transports en commun pour réduire les émissions de gaz à effet de serre.',
    ]);
    $queryAddTips->execute([
        'id' => '4',
        'content' =>
            "Mangez des aliments locaux et de saison pour réduire l'empreinte carbone liée à l'agriculture industrielle.",
    ]);
    $queryAddTips->execute([
        'id' => '5',
        'content' =>
            "Économisez de l'énergie en utilisant des appareils économes en énergie et en éteignant les lumières et les appareils électroniques lorsqu'ils ne sont pas utilisés.",
    ]);
    $queryAddTips->execute([
        'id' => '6',
        'content' =>
            "Réduisez votre consommation d'eau en prenant des douches plus courtes et en réparant les fuites d'eau rapidement.",
    ]);
    $queryAddTips->execute([
        'id' => '7',
        'content' =>
            "Utilisez des produits écologiques pour nettoyer votre maison et jardin pour réduire les polluants chimiques dans l'environnement.",
    ]);
    $queryAddTips->execute([
        'id' => '8',
        'content' =>
            "Plantez des arbres et des plantes pour aider à absorber le dioxyde de carbone et à améliorer la qualité de l'air.",
    ]);
    $queryAddTips->execute([
        'id' => '9',
        'content' =>
            'Recyclez les déchets pour réduire la quantité de matières qui se retrouvent en décharge.',
    ]);
    $queryAddTips->execute([
        'id' => '10',
        'content' =>
            'Ceci est un test de conseil tres tres tres tres long parce que je veux tester le css',
    ]);
    $queryAddTips->execute([
        'id' => '11',
        'content' =>
            'Soutenez les entreprises et les politiques qui ont des pratiques durables et écologiques.',
    ]);
    $queryAddTips->execute([
        'id' => '12',
        'content' =>
            "Sensibilisez vos amis et votre famille à l'importance de prendre des mesures pour protéger l'environnement.",
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

$queryAddMetrics = $db->prepare(
    'INSERT INTO metrics (`id`, `id_product`, `id_type`, `data`, `date`) VALUES (:id, :id_product, :type_id, :value, :date)'
);
$getProducts = $db->prepare('SELECT * FROM products');
$getTypes = $db->prepare('SELECT * FROM types');

try {
    $getProducts->execute();
    $products = $getProducts->fetchAll();
    $getTypes->execute();
    $types = $getTypes->fetchAll();
    $i = 1;
    while ($i < 100) {
        $timestamp = strtotime('2023-01-14 12:47:14') + 60 * 60 * $i;
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
    echo $e->getMessage() . PHP_EOL;
}

// insert fake faq
try {
    $queryAddFaq = $db->prepare(
        'INSERT INTO faq ( `lang`, `question`, `reponse`) VALUES (:lang, :question, :reponse)'
    );

    $queryAddFaq->execute([
        'lang' => 'fr',
        'question' => 'Qu\'est-ce qu\'un SafeHub ?',
        'reponse' =>
            'Un safeHub est un hub connecté vous permettant de surveiller votre maison et de la protéger.',
    ]);
    $queryAddFaq->execute([
        'lang' => 'fr',
        'question' => 'Comment puis-je me connecter à mon SafeHub ?',
        'reponse' =>
            'Vous pouvez vous connecter à votre SafeHub en utilisant le site SafeHub.fr avec le code produit qui vous à été fourni.',
    ]);

    $queryAddFaq->execute([
        'lang' => 'fr',
        'question' =>
            'Est-ce que je peux me connecter à plusieurs Hub en même temps',
        'reponse' =>
            'Oui, vous pouvez vous connecter à plusieurs SafeHub en même temps. Votre gestionnaire vous donnera un ou plusieurs code produit pouvant ajouter un ou plusieurs hub.',
    ]);

    $queryAddFaq->execute([
        'lang' => 'en',
        'question' => 'What is a SafeHub ?',
        'reponse' =>
            'A SafeHub is a connected hub that allows you to monitor your home and protect it.',
    ]);
    $queryAddFaq->execute([
        'lang' => 'en',
        'question' => 'How can I connect to my SafeHub ?',
        'reponse' =>
            'You can connect to your SafeHub using the SafeHub.fr website with the product code that was provided to you.',
    ]);

    $queryAddFaq->execute([
        'lang' => 'en',
        'question' => 'Can I connect to several Hub at the same time ?',
        'reponse' =>
            'Yes, you can connect to several SafeHub at the same time. Your manager will give you one or more product code to add one or more hub.',
    ]);
    $queryAddFaq->execute([
        'lang' => 'en',
        'question' => 'Can I delete my SafeHub account ?',
        'reponse' =>
            'Yes, you must contact us to delete your account. You will not be able to access your SafeHub data anymore.',
    ]);
    $queryAddFaq->execute([
        'lang' => 'en',
        'question' => 'Can I change my SafeHub account password ?',
        'reponse' =>
            'Yes, you can change your password in your account settings or by doing "forgot password" on the login page.',
    ]);
    $queryAddFaq->execute([
        'lang' => 'en',
        'question' => 'Can I change my SafeHub account email ?',
        'reponse' =>
            'Yes, you can change your email in your account settings. Be careful, if you mischange your email, you will not be able to access your account anymore.',
    ]);
    echo 'Fake faq created' . PHP_EOL;
} catch (PDOException $e) {
    echo $e->getMessage() . PHP_EOL;
}
