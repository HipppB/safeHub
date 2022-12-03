<?php
// In this file all request for the user table
require "connectDb.php";
$db = connectDb();

function getUserByEmail($email) {
    global $db;
    $query = $db->prepare("SELECT * FROM users WHERE email = :email");
    $query->execute([
        "email" => $email
    ]);
    return $query->fetch();
    return true;
}
function loginUser($email, $password) {
    $user = getUserByEmail($email);
    if($user) {
        if(password_verify($password, $user["password"])) {
            $_SESSION["user"] = $user;
            return true;
        }
    }
    return false;
}

function test() {
    echo "test";
}