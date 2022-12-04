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

    if (!empty($email) && !empty($name) && !empty($lastname)) {
        //update name of the user in db
        $error = updateUser(
            $_SESSION['user']['id'],
            $name,
            $lastname,
            $phone,
            $email
        );
        getUser($_SESSION['user']['id'], true);

        echo json_encode([
            'message' => 'Votre profil a bien été modifié',
            'success' => $error,
        ]);
    }
} else {
    $user = getUser($_SESSION['user']['id'], true); // get last user data, actualis
    include 'views/auth/edit-profile.php';
}
