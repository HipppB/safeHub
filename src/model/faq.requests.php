<?php
// In this file all request for the faq table
require_once 'connectDb.php';
$db = connectDb();

function addQuestionRep($q, $r)
{
    global $db;
    $query = $db->prepare(
        'INSERT INTO faq (question,reponse) VALUES (:question,:reponse)'
    );
    try {
        $query->execute([
            'question' => $q,
            'reponse' => $r,
        ]);
        return true;
    } catch (PDOExeption $E) {
        return false;
    }
}

function GetFAQ()
{
    global $db;
    $query = $db->prepare('SELECT * FROM faq ');
    try {
        $query->execute();
        return $query->fetchAll();
    } catch (PDOExeption $E) {
        return false;
    }
}
