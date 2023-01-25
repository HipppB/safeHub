<?php
// In this file all request for the faq table
require_once 'connectDb.php';
$db = connectDb();

function addQuestionRep($q, $r, $lang)
{
    global $db;
    $query = $db->prepare(
        'INSERT INTO faq (question,reponse, lang) VALUES (:question,:reponse, :lang)'
    );
    try {
        $query->execute([
            'question' => $q,
            'reponse' => $r,
            'lang' => $lang,
        ]);
        return true;
    } catch (PDOExeption $E) {
        return false;
    }
}
function suppQuestionRep($idq)
{
    global $db;
    $query = $db->prepare(
        'DELETE FROM `faq` WHERE `faq`.`idquestion` =:idquestion'
    );
    try {
        $query->execute([
            'idquestion' => $idq,
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
function GetFAQCurrentLang()
{
    $lang = $_SESSION['lang'];
    global $db;
    $query = $db->prepare('SELECT * FROM faq WHERE lang = :lang');
    try {
        $query->execute([
            'lang' => $lang,
        ]);
        return $query->fetchAll();
    } catch (PDOExeption $E) {
        return false;
    }
}
