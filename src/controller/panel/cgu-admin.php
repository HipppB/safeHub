<?php
require 'model/user.requests.php';
if (!userIsConnected()) {
    header('Location: /connexion');
}
include 'views/public/cgu-admin.html';
