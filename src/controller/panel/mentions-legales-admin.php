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
if (!empty($updatedTranslationEn)) {
    $responseEn = updateTranslation('mentions', $updatedTranslationEn, 'en');
}
if (!empty($updatedTranslationFr)) {
    $responseFr = updateTranslation('mentions', $updatedTranslationFr, 'fr');
}
if ($responseEn == 'success') {
}
include 'views/auth/mentions-legales-admin.php';
?>
