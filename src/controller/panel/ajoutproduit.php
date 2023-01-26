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
    $name = !empty($_POST['name']) ? htmlspecialchars($_POST['name']) : "";
    $accomodationName = !empty($_POST['accomodationName']) ? htmlspecialchars($_POST['accomodationName']) : "";
    $roomName = !empty($_POST['roomName']) ? htmlspecialchars($_POST['roomName']) : "";
    $productCode = !empty($_POST['productCode']) ? htmlspecialchars($_POST['productCode']) : "";
    $userCode = !empty($_POST['userCode']) ? htmlspecialchars($_POST['userCode']) : "";
    $userExpirationDate = !empty($_POST['userCodeExpirationDate']) ? htmlspecialchars($_POST['userCodeExpirationDate']) : "";
    $comments = !empty($_POST['comments']) ? htmlspecialchars($_POST['comments']) : null;

    if(!empty($name) && !empty($accomodationName) && !empty($roomName) && !empty($productCode) && !empty($userCode)
    && !empty($userExpirationDate)){
        $response = createProduct($name, $roomName, $accomodationName, $productCode, $userCode, $userExpirationDate, $comments);
    }


    require 'views/auth/ajoutProduit.php';
} else {
    $notfirst = true;

    require 'views/auth/dashboard.php';
}
