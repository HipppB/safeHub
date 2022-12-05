<?php
require 'model/user.requests.php';
if (!userIsConnected()) {
    header('Location: /connexion');
}
include 'views/auth/mentions-legales-admin.html';
