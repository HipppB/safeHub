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

function addTips($content)
{
    if (!userIsAdmin()) {
        return false;
    }
    global $db;
    $query = $db->prepare('INSERT INTO tips (content) VALUES (:content)');
    $query->execute([
        'content' => $content,
    ]);
}

function deleteTips($id)
{
    if (!userIsAdmin()) {
        return false;
    }
    global $db;
    $query = $db->prepare('DELETE FROM tips WHERE id = :id');
    $query->execute([
        'id' => $id,
    ]);
}

function getTipsById($id)
{
    global $db;
    $query = $db->prepare('SELECT * FROM tips WHERE id = :id');
    $query->execute([
        'id' => $id,
    ]);
    return $query->fetch();
}
