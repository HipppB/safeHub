<?php
require 'model/user.requests.php';

$isConnected = userIsConnected();
include 'views/public/index.php'; // du html

?>
