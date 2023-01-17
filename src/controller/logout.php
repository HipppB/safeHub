<?php
//close session
session_destroy();
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
