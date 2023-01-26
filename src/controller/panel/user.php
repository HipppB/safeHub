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
    if (!empty($req->search)) {
        $users = getUsers($search = $req->search);
        echo json_encode($users);
        exit();
    }
    if (userIsAdmin() && !empty($req->userid)) {
        switch ($req->action) {
            case 'toggleAdmin':
                toggleAdmin($req->userid);
                break;
            case 'deleteUser':
                deleteUser($req->userid);
                break;
            case 'toggleUserBan':
                toggleUserBan($req->userid);
                break;
            case 'toggleUserGestionnaire':
                if (!empty($req->productid)) {
                    toggleUserGestionnaire($req->userid, $req->productid);
                }
                break;
            default:
                break;
        }
    }
}
$user = getUser($_GET['userid'], false);
if ($user == false) {
    header('Location: /dashboard');
}
if (userIsAdmin()) {
    $products = getUserProducts($_GET['userid']);
} else {
    $products = getUserProducts($_GET['userid']);
}
include 'views/auth/user.php';
