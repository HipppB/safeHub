<?php
$error;
$email = htmlspecialchars($_POST['email']);

if (empty($email)) {
    require 'views/public/inscription.php';
} else {
    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $password = htmlspecialchars($_POST['password']);
    if (!empty($firstname) && !empty($lastname) && !empty($password)) {
        require 'model/user.requests.php';
        if (register($firstname, $lastname, $email, $password)) {
            echo "<script>alert('Inscription réussie !')</script>";
            header('Location: /connexion');
        } else {
            $error = 400;
            require 'views/public/inscription.php';
        }
    } else {
        $error = [
            'error-firstname' => empty($firstname),
            'error-lastname' => empty($lastname),
            'error-password' => empty($password),
        ];
        require 'views/public/inscription.php';
    }
}
