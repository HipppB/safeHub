<?php
require '../model/connectDb.php';
$db = connectDb();
$sql = file_get_contents('mvc.sql');
$db->exec($sql);

require '../model/insertData.php';
