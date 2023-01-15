<?php
require 'model/productDatas.request.php';
echo json_encode(retrieveProductDatasByType("carbon_dioxide"));