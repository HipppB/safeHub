<?php
require_once 'model/user.requests.php';
require 'model/product.requests.php';

if (!userIsConnected()) {
    header('Location: /connexion');
}



if(isset($_GET['productid']) && (userIsAdmin() || userIsGestionnaire($_GET['productid']))){
    $name = !empty($_POST['name']) ? htmlspecialchars($_POST['name']) : "";
    $accomodationName = !empty($_POST['accomodationName']) ? htmlspecialchars($_POST['accomodationName']) : "";
    $roomName = !empty($_POST['roomName']) ? htmlspecialchars($_POST['roomName']) : "";
    $productCode = !empty($_POST['productCode']) ? htmlspecialchars($_POST['productCode']) : "";
    $userCode = !empty($_POST['userCode']) ? htmlspecialchars($_POST['userCode']) : "";
    $userExpirationDate = !empty($_POST['userCodeExpirationDate']) ? htmlspecialchars($_POST['userCodeExpirationDate']) : "";
    $comments = !empty($_POST['comments']) ? htmlspecialchars($_POST['comments']) : null;
    if(!empty($name) && !empty($accomodationName) && !empty($roomName) && !empty($productCode) && !empty($userCode)
        && !empty($userExpirationDate)){
        $response = updateProduct($name, $roomName, $accomodationName, $productCode, $userCode, $userExpirationDate, $comments, $_GET['productid']);
    }
    $product = getProductById($_GET['productid']);


//    if($product == false){
//        header('Location: /panel/dashboard');
//    }else{
        require 'views/auth/modifyProduct.php';
//    }
}else{
    header('Location: /panel/dashboard');
}

var_dump($response);
