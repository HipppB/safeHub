<?php
$error = [
    'error-firstname' => false,
    'error-lastname' => false,
    'error-password' => false,
];
if (isset($_SESSION['user'])) {
    header('Location: /panel/dashboard');
}
if (isset($_POST['email']) && !empty($_POST['email'])) {
    $email = htmlspecialchars($_POST['email']);

    if (
        isset($_POST['firstname']) &&
        !empty($_POST['firstname']) &&
        isset($_POST['lastname']) &&
        !empty($_POST['lastname']) &&
        isset($_POST['password']) &&
        !empty($_POST['password'])
    ) {
        $firstname = htmlspecialchars($_POST['firstname']);
        $lastname = htmlspecialchars($_POST['lastname']);
        $password = htmlspecialchars($_POST['password']);
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
            'error-firstname' => isset($_POST['firstname']),
            'error-lastname' => isset($_POST['lastname']),
            'error-password' => isset($_POST['password']),
        ];
        require 'views/public/inscription.php';
    }
} else {
    require 'views/public/inscription.php';
}
