<?php

$db = connectDb();

include './config/dropDb.php';
$sql = file_get_contents('./config/mvc.sql');
$db->exec($sql);
echo 'Database created' . PHP_EOL;
$translations = json_decode(
    file_get_contents('./config/translations.json'),
    true
);
include 'model/insertData.php';
