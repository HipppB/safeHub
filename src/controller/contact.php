<?php
require 'controller/mail.php';
$email = !empty($_POST["email"]) ? htmlspecialchars($_POST['email']) : "";
$body = !empty($_POST["message"]) ? htmlspecialchars($_POST['message']): "";
$response = "";

if(!empty($email) && !empty($body)) {
    $response =sendEmail($email ,$body, 'Contact');
}
include 'views/public/contact.php';
