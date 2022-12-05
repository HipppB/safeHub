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
    return $query->fetch();
}

function printTranslation($key)
{
    $lang = $_SESSION['lang'] ?? 'fr';
    $result = translate($key, $lang);
    echo $result['value'];
    return $result ? 1 : 0;
}
