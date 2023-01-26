<?php

$error = '';
require 'model/user.requests.php';
require 'model/product.requests.php';
if (!userIsConnected()) {
    header('Location: /connexion');
}
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

if (userIsAdmin() || userIsGestionnaire()) {
    // echo 'To do : Dashboard admin view'; //Dashboard Admin
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // $users = getUsers($search = $_POST['search']);
        $req = file_get_contents('php://input');
        $req = json_decode($req);
        $users = getUsers($search = $req->search);
        echo json_encode($users);
    } else {
        $users = getUsers();
        $products = getProducts();
        require 'views/auth/dashboardGestionnaire.php';
    }
} else {
    $products = getUserProducts($_SESSION['user']['id']);
    if (count($products) > 0) {
        require 'model/tips.requests.php';
        $tipFront = getRandomTips();
        require 'views/auth/dashboard-products.php'; //Dashboard User
    } else {
        require 'views/auth/dashboard.php';
    }
}

?>
