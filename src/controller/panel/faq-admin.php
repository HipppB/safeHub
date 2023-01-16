<?php
require 'model/user.requests.php';
if (!userIsConnected()) {
    header('Location: /connexion');
}
$user = $_SESSION['user'];

require 'model/faq.requests.php';
$retour = '';

if (!empty($_POST['ajouter'])) {
    if (!empty($_POST['question']) && !empty($_POST['reponse'])) {
        $q = $_POST['question'];
        $r = $_POST['reponse'];
        $retour = addQuestionRep($q, $r);
    }
}
$faqs = GetFAQ();
include 'views/auth/faq-admin.php';

?>
