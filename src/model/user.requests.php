<?php
// In this file all request for the user table
require_once 'connectDb.php';
$db = connectDb();

function getUserByEmail($email)
{
    global $db;
    $query = $db->prepare('SELECT * FROM users WHERE email = :email');
    $query->execute([
        'email' => $email,
    ]);
    return $query->fetch();
}
function loginUser($email, $password)
{
    $user = getUserByEmail($email);
    if ($user) {
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user;
            return true;
        }
    }
    return false;
}
function userIsConnected()
{
    if (isset($_SESSION['user'])) {
        return true;
    }
    return false;
}
function userIsAdmin()
{
    if (
        isset($_SESSION['user']['is_admin']) &&
        $_SESSION['user']['is_admin'] == 1
    ) {
        return true;
    }
    return false;
}

function getUserProducts($user_id)
{
    global $db;
    $query = $db->prepare("SELECT * 
    FROM products 
    INNER JOIN products_users 
    ON products_users.id_user = :user_id");
    $query->execute([
        'user_id' => $_SESSION['user']['id'],
    ]);

    return $query->fetchAll();
}

function register($name, $lastname, $email, $password)
{
    global $db;
    $query = $db->prepare(
        'INSERT INTO users (name, lastname, email, password) VALUES (:name, :lastname, :email, :password)'
    );
    try {
        $query->execute([
            'name' => $name,
            'lastname' => $lastname,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
        ]);
        return true;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return false;
}
