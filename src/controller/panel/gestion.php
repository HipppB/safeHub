<?php
require 'model/user.requests.php';
if (!userIsConnected()) {
    header('Location: /connexion');
}
if (userIsAdmin()){
    require 'views/auth/gestion.php';
} else {
    header('Location: /panel/dashboard');
}
