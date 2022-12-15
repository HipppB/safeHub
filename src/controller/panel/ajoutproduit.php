<?php
require 'model/user.requests.php';
if (!userIsConnected()) {
    header('Location: /connexion');
}

echo 'hey';
if (userIsAdmin()) {
    require 'views/auth/ajoutProduit.html';
} else {
    $notfirst = true;

    require 'views/auth/dashboard.php';
}
