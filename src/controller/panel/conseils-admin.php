<?php

require 'model/user.requests.php';
if (!userIsConnected()) {
    header('Location: /connexion');
}

$error = '';
require 'model/tips.requests.php';
$tips = getTips();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $req = file_get_contents('php://input');
    $req = json_decode($req);

    $content = htmlspecialchars($req->content);

    if (empty($req->content)) {
        $error = 'Le champ est obligatoire';
    } elseif (strlen($req->content) < 3) {
        $error = 'Le champ doit contenir au moins 3 caractères';
    }

    if (!$error) {
        addTips($content);
        $tips = getTips();

        echo json_encode([
            'tips' => $tips,
            'success' => true,
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'error' => $error,
        ]);
    }
} else {
    if (isset($_GET['id']) && isset($_GET['action'])) {
        if ($_GET['action'] == 'delete') {
            deleteTips($_GET['id']);
            header('Location: /panel/conseils-admin');
        }
    }

    include 'views/auth/conseils-admin.php';
}
