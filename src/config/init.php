<?php
require_once '../../vendor/autoload.php';
require '../model/connectDb.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__. '/../..');
$dotenv->load();

$db = connectDb();
include 'dropDb.php';
$sql = file_get_contents('mvc.sql');
$db->exec($sql);
echo 'Database created' . PHP_EOL;
$translations = json_decode(
    file_get_contents('./translations.json'),
    true
);
include '../model/insertData.php';
