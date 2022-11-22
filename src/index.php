<?php

if(isset($_GET['url']) && !empty($_GET['url'])) {
    $url = str_replace([".html", ".php"], "",$_GET['url']);
} else {
    $url = 'index';
}

// On appelle le contrôleur
include('controller/' . $url . '.php');
