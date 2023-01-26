<?php

require 'model/user.requests.php';
if (!userIsConnected()) {
    header('Location: /connexion');
}
if (userIsAdmin()) {
    $error = '';
    require 'model/tips.requests.php';
    $tips = getTips();
    $tipsLang = GetTipsCurrentLang();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $req = file_get_contents('php://input');
        $req = json_decode($req);

        if ($req->action == 'delete') {
            deleteTips($req->id);
            $tips = getTips();

            echo json_encode([
                'tips' => $tips,
                'success' => true,
            ]);
            exit();
        }

        $content = htmlspecialchars($req->content);

        if (empty($req->content)) {
            $error = 'Le champ est obligatoire';
        } elseif (strlen($req->content) < 3) {
            $error = 'Le champ doit contenir au moins 3 caractères';
        }

        if (!$error) {
            var_dump($_POST['isEnglish']);
            $lang = !empty($_POST['isEnglish']) ? 'en' : 'fr';
            addTips($content, $lang);
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
        include 'views/auth/conseils-admin.php';
    }
} else {
    header('Location: /panel/dashboard');
}
