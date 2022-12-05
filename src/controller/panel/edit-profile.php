<?php
require 'model/user.requests.php';

if (!userIsConnected()) {
    header('Location: /connexion');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $req = file_get_contents('php://input');
    $req = json_decode($req);

    $error;
    $name = htmlspecialchars(
        $req->name ? $req->name : $_SESSION['user']['name']
    );
    $lastname = htmlspecialchars(
        $req->lastname ? $req->lastname : $_SESSION['user']['lastname']
    );
    $phone = htmlspecialchars(
        $req->phone ? $req->phone : $_SESSION['user']['phone']
    );
    $email = htmlspecialchars(
        $req->email ? $req->email : $_SESSION['user']['email']
    );

    if (empty($req->email) || empty($req->lastname) || empty($req->name)) {
        $error = 'Tout les champs sont obligatoires sauf le téléphone';
    } elseif (!filter_var($req->email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Veuillez entrer une adresse email valide';
    } elseif (
        emailExist($req->email) &&
        $req->email != $_SESSION['user']['email']
    ) {
        $error = 'Cette adresse email est déjà utilisée';
    } elseif (strlen($req->name) < 2) {
        $error = 'Votre prénom doit contenir au moins 2 caractères';
    } elseif (strlen($req->lastname) < 2) {
        $error = 'Votre nom doit contenir au moins 2 caractères';
    } elseif (strlen($req->phone) > 1 && strlen($req->phone) < 10) {
        $error =
            'Votre numéro de téléphone doit contenir au moins 10 caractères';
    }
    //update name of the user in db
    updateUser($_SESSION['user']['id'], $name, $lastname, $phone, $email);
    getUser($_SESSION['user']['id'], true);

    if (!$error) {
        echo json_encode([
            'success' => true,
            'message' => 'Votre profil a bien été mis à jour',
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => $error,
        ]);
    }
} else {
    $user = getUser($_SESSION['user']['id'], true); // get last user data, actualis
    include 'views/auth/edit-profile.php';
}
