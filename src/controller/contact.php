<?php
require 'controller/mail.php';
$email = !empty($_POST["email"]) ? htmlspecialchars($_POST['email']) : "";
$body = !empty($_POST["message"]) ? htmlspecialchars($_POST['message']): "";
$firstname = !empty($_POST["firstname"]) ? htmlspecialchars($_POST['firstname']): "";
$surname = !empty($_POST["surname"]) ? htmlspecialchars($_POST['surname']): "";
$telephone = !empty($_POST["telephone"]) ? htmlspecialchars($_POST['telephone']): "";
$submit = !empty($_POST["submit"]) ? htmlspecialchars($_POST['submit']): "";
$response = "";

if(!empty($email) && !empty($body) && !empty($firstname) && !empty($surname)) {
    $body = "Email: $email <br/> 
    $firstname <br/>    
    $surname <br/>
    $telephone <br/>        
Message:<br/> $body";
    $response =sendEmail($email ,$body, 'Contact');
}else if($submit){
    $response = "Veuillez remplir tous les champs";
}
include 'views/public/contact.php';
