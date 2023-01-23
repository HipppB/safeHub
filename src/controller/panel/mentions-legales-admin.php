<?php
require 'model/user.requests.php';
if (!userIsConnected()) {
    header('Location: /connexion');
}

$updatedTranslationFr = isset($_POST['mentionsFr'])
    ? $_POST['mentionsFr']
    : null;
$updatedTranslationEn = isset($_POST['mentionsEn'])
    ? $_POST['mentionsEn']
    : null;
$responseEn = 'none';
$responseFr = 'none';
if ($updatedTranslationEn != null) {
    $responseEn = updateTranslation('mentions', $updatedTranslationEn, 'en');
}
if ($updatedTranslationEn != null) {
    $responseFr = updateTranslation('mentions', $updatedTranslationFr, 'fr');
}
include 'views/auth/mentions-legales-admin.php';
?>
