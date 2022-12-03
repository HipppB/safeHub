<?php
//connect to db and insert fake data
require "connectDb.php";
$db = connectDb();
//deletes existing users and insert fake users
$queryAddUser = $db->prepare("INSERT INTO users 
    (`name`, `lastname`, `password`, `email`, `phone`, `birth_date`, `is_admin`) 
    VALUES (:name, :lastname, :password, :email, :phone, :birth_date, :is_admin)"
    );
$queryDeleteAllUser = $db->prepare("DELETE FROM users");
echo "request prepared"."<br>";
$queryDeleteAllUser->execute();
$queryAddUser->execute([
    "email" => "admin@test.com",
    "password" => password_hash($_ENV["PASS"], PASSWORD_DEFAULT),
    "name" => "admin",
    "lastname" => "admin",
    "phone" => "0000000000",
    "birth_date" => "2022-12-06",
    "is_admin" => "1"
]);

$queryAddUser->execute([
    "email" => "user@test.com",
    "password" => password_hash($_ENV["PASS"], PASSWORD_DEFAULT),
    "name" => "user",
    "lastname" => "user",
    "phone" => "0000000000",
    "birth_date" => "2022-12-06",
    "is_admin" => "0"
]);

echo "Fake users inserted";