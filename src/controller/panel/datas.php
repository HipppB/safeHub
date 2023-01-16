<?php

require 'model/user.requests.php';
require 'model/productDatas.request.php';
if (!userIsConnected()) {
    header('Location: /connexion');
}

$productId = !empty($_GET['productId']) ? htmlspecialchars($_GET['productId']) : "";
$type = !empty($_GET['type']) ? htmlspecialchars($_GET['type']) : "";

if(!empty($productId) && !empty($type)){
$datas = retrieveProductDatasByType($type, $productId);
}
require 'views/auth/datas.php';

