<?php
$error;
$email = htmlspecialchars($_POST["email"]);
$password = htmlspecialchars($_POST["password"]);
if($_SESSION["user"]) {
    header("Location: /panel/dashboard");
} 
if(!empty($email) && !empty($password)) {
    require "model/user.requests.php";

    // Here we need to check if the user exists and if the password is correct
    // If the user exists and the password is correct we need to create a session
    // with the user information
    // If the user doesn't exist or the password is incorrect we need to redirect
    // the user to the login page
    
    if(loginUser($email, $password)) {
        header("Location: /panel/dashboard");
    } else {
        $error = 401;
        require 'views/public/connexion.php';
    }
} else {
    require 'views/public/connexion.php';

}
?>
