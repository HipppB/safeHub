<?php
require 'model/user.requests.php';
if (!userIsConnected()) {
    header('Location: /connexion');
}
include 'views/auth/conseils-admin.html';
