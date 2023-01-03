<?php
require 'model/user.requests.php';
require 'model/translate.requests.php';
if (!userIsConnected()) {
    header('Location: /connexion');
}
include 'views/auth/mentions-legales-admin.html';
