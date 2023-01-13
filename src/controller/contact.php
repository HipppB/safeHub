<?php
require 'controller/mail.php';
$email = !empty($_POST["email"]) ? htmlspecialchars($_POST['email']) : "";
$message = !empty($_POST["message"]) ? nl2br($_POST['message']): "";
$firstname = !empty($_POST["firstname"]) ? htmlspecialchars($_POST['firstname']): "";
$surname = !empty($_POST["surname"]) ? htmlspecialchars($_POST['surname']): "";
$telephone = !empty($_POST["telephone"]) ? htmlspecialchars($_POST['telephone']): "";
$submit = !empty($_POST["submit"]) ? htmlspecialchars($_POST['submit']): "";
$response = "";

if(!empty($email) && !empty($message) && !empty($firstname) && !empty($surname)) {
    $body = "<h1>Une nouvelle demande de contact est arrivée</h1>
<h2>Coordonnées du contact:</h2>
<p>

Email: $email <br/>
    $firstname <br/>
    $surname <br/>
    $telephone <br/>
</p>
<h2>
Message:
</h2>
<p>

$message
</p>
";
    $response =sendEmail($_ENV['MAIL_CONTACT'] ,$body, 'Contact');
}else if($submit){
    $response = "Veuillez remplir tous les champs";
}

if ($response == 'Le message a été envoyé') {
    $email = "";
    $message = "";
    $firstname = "";
    $surname = "";
    $telephone = "";
    $submit = "";
}

include 'views/public/contact.php';
