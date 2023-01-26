<?php
require 'model/user.requests.php';
require 'model/product.requests.php';
if (!userIsConnected()) {
    header('Location: /connexion');
}
if (!(userIsAdmin() || userIsGestionnaire()) || empty($_GET['userid'])) {
    header('Location: /panel/dashboard');
}
// if GET method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $req = file_get_contents('php://input');
    $req = json_decode($req);

    switch ($req->action) {
        case 'toggleAdmin':
            if (userIsAdmin() && !empty($req->userid)) {
                toggleAdmin($req->userid);
            }
            break;

        case 'deleteUser':
            if (userIsAdmin() && !empty($req->userid)) {
                deleteUser($req->userid);
            }
            break;
        case 'toggleUserBan':
            if (userIsAdmin() && !empty($req->userid)) {
                toggleUserBan($req->userid);
            }
            break;
        case 'toggleUserGestionnaire':
            if (
                userIsAdmin() &&
                !empty($req->userid) &&
                !empty($req->productid)
            ) {
                toggleUserGestionnaire($req->userid, $req->productid);
            }
            break;
        default:
            break;
    }
}
$user = getUser($_GET['userid'], false);
if ($user == false) {
    header('Location: /dashboard');
}
$products = getUserProducts($_GET['userid']);
include 'views/auth/user.php';
