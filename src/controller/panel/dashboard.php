<?php
require 'model/user.requests.php';

if (!userIsConnected()) {
    header('Location: /connexion');
} else {
    if (userIsAdmin()) {
        // echo "You are an admin"."<br>";
        // echo $_SESSION["user"]["id"];
        // echo getUserProducts($_SESSION['user']['id']);

        require 'views/auth/dashboard.php'; //Dashboard Admin
    } else {
        echo 'You are a user';
        echo getUserProducts($_SESSION['user']['id']);
        require 'views/auth/dashboard.php';
    }
}

?>
