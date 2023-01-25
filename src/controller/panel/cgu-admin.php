<?php
require 'model/user.requests.php';
if (!userIsConnected()) {
    header('Location: /connexion');
}
$updatedTranslationFr = isset($_POST['cguFr']) ? $_POST['cguFr'] : null;
$updatedTranslationEn = isset($_POST['cguEn']) ? $_POST['cguEn'] : null;
$responseEn = 'none';
$responseFr = 'none';
if ($updatedTranslationEn != null) {
    $responseEn = updateTranslation('cgu', $updatedTranslationEn, 'en');
}
if ($updatedTranslationEn != null) {
    $responseFr = updateTranslation('cgu', $updatedTranslationFr, 'fr');
}
include 'views/auth/cgu-admin.php';
