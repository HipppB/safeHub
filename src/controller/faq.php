<?php
// Include the model
include 'model/faq.requests.php';
// Get the faq
$faq = GetFAQCurrentLang();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $req = file_get_contents('php://input');
    $req = json_decode($req);
    if (!empty($req->search)) {
        $faq = GetFAQCurrentLang($search = $req->search);
        echo json_encode($faq);
    } else {
        echo 500;
    }
} else {
    include 'views/public/faq.php';
}
