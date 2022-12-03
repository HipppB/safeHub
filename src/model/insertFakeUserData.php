<?php
//connect to db and insert fake data
require "connectDb.php";
$db = connectDb();
//insert fake users
$query = $db->prepare("INSERT INTO user (email, password, firstname, lastname, role) VALUES (:email, :password, :firstname, :lastname, :role)");
$query->execute([
    "email" => "admin@test.com",
    "password" => password_hash("admin", $_ENV["PASSWORD_DEFAULT"]),
    "firstname" => "admin",
    "lastname" => "admin",
    "role" => "admin"
]);
$query->execute([
    "email" => "user@test.com",
    "password" => password_hash("user", $_ENV["PASSWORD_DEFAULT"]),
    "firstname" => "user",
    "lastname" => "user",
    "role" => "user"
]);
