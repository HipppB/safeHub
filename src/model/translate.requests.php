<?php
require_once 'connectDb.php';
$db = connectDb();

function translate($key, $lang)
{
    global $db;
    try {
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
    } catch (PDOException $e) {
        echo $e;
        return 'Undefined';
    }
}

function printTranslation($key, $noprint = false)
{
    $lang = $_SESSION['lang'] ?? 'fr';
    $result = translate($key, $lang);
    if (!$noprint) {
        echo $result;
    }
    return $result;
}

function updateTranslation($key, $value, $lang)
{
    global $db;
    $query = $db->prepare(
        'UPDATE translations SET value = :value WHERE `key` = :key AND `lang` = :lang'
    );
    try {
        $query->execute([
            'key' => $key,
            'lang' => $lang,
            'value' => $value,
        ]);
        return 'success';
    } catch (PDOException $error) {
        return $error;
    }
}
