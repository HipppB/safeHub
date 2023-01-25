<?php
require 'controller/mail.php';
require 'model/user.requests.php';

$email = !empty($_POST["email"]) ? htmlspecialchars($_POST['email']) : "";

if(!empty($email)) {
    $user =getUserByEmail($email);
    if($user){
        $expFormat = mktime(
            date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
        );
        $expDate = date("Y-m-d H:i:s", $expFormat);
        $key = bin2hex(random_bytes(16));
        $response = addTemporaryToken($key, $email, $expDate);
    }
    $url = $_ENV['DOMAIN_NAME'];
    $token = md5($email);
//    $response = sendEmail($email, "
//    <h1>Vous avez demandé à réinitialiser votre mot de passe</h1>
//<p>
//    Pour réinitialiser votre mot de passe, veuillez cliquer sur le lien ci-dessous:
//</p>
//<a href=\"$url/resetPassword?token=$token\">Réinitialiser mon mot de passe</a>
//", 'Réinitialisation de mot de passe');
}

include 'views/public/forgotPassword.php';

var_dump($user);
$test = [
    [
        'id' => 1,
        'email' => 'kjfkjd',
    ]
];
var_dump($test);
