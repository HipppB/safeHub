<?php

require 'model/user.requests.php';

$currentToken = !empty($_GET['token']) ? htmlspecialchars($_GET['token']) : "";
$password = !empty($_POST['password']) ? htmlspecialchars($_POST['password']) : "";
$confirmPassword = !empty($_POST['confirmPassword']) ? htmlspecialchars($_POST['confirmPassword']) : "";
$response = "";
if(!empty($currentToken) && !empty($password) && !empty($confirmPassword)) {
    $token = getTemporaryToken($currentToken);
    if(!$token) {
        $response = "Le lien de réinitialisation de mot de passe est invalide";
    } else if($token[0]['expDate'] < date("Y-m-d H:i:s")) {
        $response = "Le lien de réinitialisation de mot de passe a expiré";
    } else if($password != $confirmPassword) {
        $response = "Les mots de passe ne correspondent pas";
    } else {
        $user = getUserByEmail($token[0]['email']);
        if(!$user){
            $response = "L'utilisateur n'existe pas";
        } else {
            $updated = updatePassword($user['id'], $password);
            deleteUserTemporaryTokens($token[0]['email']);
            if($updated){
                $response = "Votre mot de passe a été mis à jour";
            } else {
                $response = "Une erreur est survenue";
            }
        }
    }
}

require 'views/public/resetPassword.php';
