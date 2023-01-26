<?php
//In this file all request for the tips table

require_once 'connectDb.php';
$db = connectDb();

function getTips()
{
    global $db;
    $query = $db->prepare('SELECT * FROM tips');
    $query->execute();
    return $query->fetchAll();
}

function addTips($content, $lang)
{
    if (!userIsAdmin()) {
        return false;
    }
    global $db;
    $query = $db->prepare(
        'INSERT INTO tips (content, lang) VALUES (:content, :lang)'
    );
    try {
        $query->execute([
            'content' => $content,
            'lang' => $lang,
        ]);
    } catch (PDOException $e) {
        return false;
    }
}

function deleteTips($id)
{
    if (!userIsAdmin()) {
        return false;
    }
    global $db;
    try {
        $query = $db->prepare('DELETE FROM tips WHERE id = :id');
        $query->execute([
            'id' => $id,
        ]);
    } catch (PDOException $e) {
        return false;
    }
}

function getRandomTips()
{
    global $db;
    $query = $db->prepare('SELECT * FROM tips');
    $query->execute();
    $tips = $query->fetchAll(PDO::FETCH_ASSOC);

    if (empty($tips)) {
        return false;
    }

    $random_index = array_rand($tips);

    return $tips[$random_index];
}

function GetTipsCurrentLang()
{
    $lang = $_SESSION['lang'];
    global $db;
    $query = $db->prepare('SELECT * FROM tips WHERE lang = :lang');
    try {
        $query->execute([
            'lang' => $lang,
        ]);
        return $query->fetchAll();
    } catch (PDOException $E) {
        return false;
    }
}
