<?php
require 'model/user.requests.php';
if (!userIsConnected()) {
    header('Location: /connexion');
}
$user = $_SESSION['user'];
require 'views/auth/profile.php';
