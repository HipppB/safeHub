<?php
require 'model/productDatas.request.php';
$productId = !empty($_GET['productId']) ? htmlspecialchars($_GET['productId']) : "";
$type = !empty($_GET['type']) ? htmlspecialchars($_GET['type']) : "";

if(!empty($productId) && !empty($type)){
    $datas = retrieveProductDatasByTypeLast20($type, $productId);
    echo json_encode($datas);
} else {
    echo json_encode([]);
}
