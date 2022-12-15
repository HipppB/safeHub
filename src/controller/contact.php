<?php
require 'controller/mail.php';
$response='';
$email = $_POST["email"];
$message = htmlspecialchars($_POST["message"]);
echo $message;
if(!empty($email) && !empty($subject) && !empty($message)) {
//    $response = sendMail($email, 'Contact', $message);
    require 'views/public/contact.php';
}else {
    require 'views/public/contact.php';
}
