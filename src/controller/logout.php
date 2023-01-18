<?php
//close session
$lang = $_SESSION['lang'];
session_destroy();
session_start();
$_SESSION['lang'] = $lang;
if (isset($_GET['redirect'])) {
    $authorizedRedirection = ['connexion', 'inscription', 'forgotPassword'];
    if (in_array($_GET['redirect'], $authorizedRedirection)) {
        header('Location: /' . $_GET['redirect']);
    } else {
        header('Location: /');
    }
} else {
    header('Location: /');
}
