<?php
require 'model/user.requests.php';
require 'model/product.requests.php';
if (isset($_POST['productUserCode'])) {
    $user = $_SESSION['user'];
    $products = addProductToUserWithUserCode(
        $_POST['productUserCode'],
        $user['id']
    );
    if ($products > 0) {
        $error = 'success';
    } else {
        $error = 401;
    }
}

if (!userIsConnected()) {
    header('Location: /connexion');
}

if (userIsAdmin()) {
    require 'views/auth/ajoutProduit.html';
} else {
    $notfirst = true;

    require 'views/auth/dashboard.php';
}
