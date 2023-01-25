<?php
require 'model/user.requests.php';
require 'model/product.requests.php';
if (!userIsConnected()) {
    header('Location: /connexion');
}
if (!(userIsAdmin() || userIsGestionnaire()) || empty($_GET['userid'])) {
    header('Location: /panel/dashboard');
}

$user = getUser($_GET['userid'], false);
if ($user == false) {
    header('Location: /dashboard');
}
$products = getUserProducts($_GET['userid']);
include 'views/auth/user.php';
