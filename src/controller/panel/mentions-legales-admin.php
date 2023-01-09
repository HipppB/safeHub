<?php
require 'model/user.requests.php';
if (!userIsConnected()) {
    header('Location: /connexion');
}

$updatedTranslationFr = $_POST['mentionsFr'] ? $_POST['mentionsFr'] : '';
$updatedTranslationEn = $_POST['mentionsEn'] ? $_POST['mentionsEn'] : '';
$responseEn;
$responseFr;
if (!empty($updatedTranslationEn)) {
    $responseEn = updateTranslation('mentions', $updatedTranslationEn, 'en');
}
if (!empty($updatedTranslationFr)) {
    $responseFr = updateTranslation('mentions', $updatedTranslationFr, 'fr');
}
if ($responseEn == 'success') {
}
include 'views/auth/mentions-legales-admin.php';
