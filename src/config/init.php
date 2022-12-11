<?php
require_once '../../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__. '/../..');
$dotenv->load();

require '../model/connectDb.php';
$db = connectDb();
$sql = file_get_contents('mvc.sql');
$db->exec($sql);

require '../model/insertData.php';
