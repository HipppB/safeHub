<?php
require_once 'connectDb.php';
$db = connectDb();

function translate($key, $lang)
{
    global $db;
    $query = $db->prepare(
        "SELECT * 
        FROM translations
        WHERE `key` = :keyrequested AND `lang` = :langrequested
        "
    );
    //SELECT * FROM translations WHERE `key` = 'home_subtitle' AND `lang` = 'fr'
    $query->execute([
        'keyrequested' => $key,
        'langrequested' => $lang,
    ]);
    return $query->fetch()['value'];
}

function printTranslation($key, $noprint = false)
{
    $lang = $_SESSION['lang'] ?? 'fr';
    $result = translate($key, $lang);
    if (!$noprint) {
        echo $result ? $result : 'Undefined';
    }
    return $result ? $result : 'Undefined';
}
