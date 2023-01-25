<?php
# Display one product // require to be admin / gestionnaire
require 'model/product.requests.php';
if (isset($_GET['productid'])) {
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
