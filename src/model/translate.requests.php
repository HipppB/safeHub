q<?php
require_once 'connectDb.php';
$db = connectDb();

function translate($key, $lang)
{
    global $db;
    $query = $db->prepare(
        'SELECT * FROM translations WHERE key = :key AND lang = :lang'
    );
    $query->execute([
        'key' => $key,
        'lang' => $lang,
    ]);
    return $query->fetch();
}

function printTranslation($key, $lang)
{
    global $db;
    $query = $db->prepare(
        'SELECT * FROM translations WHERE key = :key AND lang = :lang'
    );
    $query->execute([
        'key' => $key,
        'lang' => $lang,
    ]);
    $result = $query->fetch();
    echo $result['value'];
    return $result ? 1 : 0;
}

