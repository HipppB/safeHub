<?php

if(isset($_GET['url']) && !empty($_GET['url'])) {
    // Si la variable cible est passé en GET
    $url = $_GET['url']; //user, sensor, etc.
    
} else {
    // Si aucun contrôleur défini en GET, on bascule sur utilisateurs
    $url = 'index';
}

// On appelle le contrôleur
include('controller/' . $url . '.php');
