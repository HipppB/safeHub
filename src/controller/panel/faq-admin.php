<?php
require 'model/user.requests.php';
if (!userIsConnected()) {
    header('Location: /connexion');
}
$user = $_SESSION['user'];
include 'views/auth/faq-admin.html';

$bdd= new PDO('mysql:host=mysql:3306;db=safeHub;charset=utf8', '')
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_POST['question'] && $_POST['question']!="")){
    $q=$_POST['question'];
}

if (isset($_POST['reponse'] && $_POST['reponse']!="")){
    $r=$_POST['reponse'];
}





if (empty($r->reponse) || empty($q->question) ) {
    $error = 'Tout les champs sont obligatoires';
} elseif (
    emailExist($req->email) &&
    $req->email != $_SESSION['user']['email']
) {
    $error = 'Cette adresse email est déjà utilisée';
} elseif (strlen($q->question) < 2) {
    $error = 'Votre question doit contenir au moins 2 caractères';
} elseif (strlen($r->reponse) < 2) {
    $error = 'Votre reponse doit contenir au moins 2 caractères';
}



