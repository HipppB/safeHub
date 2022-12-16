<?php

require 'model/user.requests.php';
if (!userIsConnected()) {
    header('Location: /connexion');
}
require 'views/auth/datas.html';
