<?php
require 'model/user.requests.php';
require 'model/faq.requests.php';

if (!userIsAdmin()) {
    header('Location: /connexion');
}
if (isset($_GET['id']) && isset($_GET['action'])) {
    if ($_GET['action'] == 'delete') {
        suppQuestionRep($_GET['id']);
    }
}
$user = $_SESSION['user'];
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
