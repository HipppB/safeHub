<?php

$error = '';
require 'model/user.requests.php';
require 'model/product.requests.php';
if (isset($_POST['productUserCode'])) {
    $user = $_SESSION['user'];
    $products = addProductToUserWithUserCode(
        $_POST['productUserCode'],
        $user['id']
    );
    if (count($products) > 0) {
        $error = 'success';
    } else {
        $error = 401;
    }
}

if (!userIsConnected()) {
    header('Location: /connexion');
}

if (userIsAdmin() || userIsGestionnaire()) {
    // echo 'To do : Dashboard admin view'; //Dashboard Admin
    $users = getUsers();
    $products = getProducts();
    require 'views/auth/dashboardGestionnaire.php';
} else {
    $products = getUserProducts($_SESSION['user']['id']);
    if (count($products) > 0) {
        require 'views/auth/dashboard-products.php'; //Dashboard User
    } else {
        require 'views/auth/dashboard.php';
    }
}

?>
