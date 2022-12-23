<?php

require 'model/user.requests.php';
if (!userIsConnected()) {
    header('Location: /connexion');
}

$error = '';
require 'model/tips.requests.php';
$tips = getTips();

$content = htmlspecialchars($_POST['content']);
if (!empty($content)) {
    $error = 400;
}

include 'views/auth/conseils-admin.php';
