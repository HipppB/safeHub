<?php
# Display one product // require to be admin / gestionnaire
require 'model/product.requests.php';
require 'model/user.requests.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $req = file_get_contents('php://input');
    $req = json_decode($req);
    if (userIsAdmin() || userIsGestionnaire($req->productid)) {
        $users = getUsers(
            $search = $req->search,
            $productid = $_GET['productid']
        );
        echo json_encode($users);
    } else {
        echo 500;
    }
} elseif (
    isset($_GET['productid']) &&
    (userIsAdmin() || userIsGestionnaire($_GET['productid']))
) {
    $product = getProductById($_GET['productid']);
    $users = getUsersOfProducts($_GET['productid']);
    if ($product == false) {
        header('Location: /panel/dashboard');
    } else {
        require 'views/auth/product.php';
    }
} else {
    header('Location: /panel/dashboard');
}
