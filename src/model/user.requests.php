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

function getUser($id, $setInSession, $includePassword = false)
{
    global $db;
    if ($includePassword) {
        $query = $db->prepare('SELECT * FROM users WHERE id = :id');
    } else {
        $query = $db->prepare(
            'SELECT name, id, lastname, email, phone, birth_date, is_admin FROM users WHERE id = :id'
        );
    }
    $query->execute([
        'id' => $id,
    ]);
    $user = $query->fetch();
    if (isset($setInSession) && $setInSession) {
        $_SESSION['user'] = $user;
    }
    return $user;
}

function getUsers($search = null)
{
    //If the user is admin we return all users
    if (userIsAdmin()) {
        global $db;
        if (empty($search)) {
            $query = $db->prepare(
                'SELECT  name, id, lastname, email, phone, birth_date, is_admin FROM users'
            );
            $query->execute();
            return $query->fetchAll();
        }
        $query = $db->prepare(
            'SELECT name, id, lastname, email, phone, birth_date, is_admin FROM users WHERE name LIKE :search OR lastname LIKE :search OR email LIKE :search OR phone LIKE :search'
        );
        $query->execute([
            'search' => '%' . $search . '%',
        ]);
        return $query->fetchAll();
    }
    //If the user is gestionnaire on a product, we return all users of this product
    if (userIsGestionnaire()) {
        global $db;
        if (empty($search)) {
            $query = $db->prepare(
                'SELECT name, id, lastname, email, phone, birth_date, is_admin FROM users INNER JOIN products_users ON products_users.id_user = users.id WHERE products_users.id_product = :id_product'
            );
            $query->execute([
                'id_product' => $_SESSION['user']['id_product'],
            ]);
            return $query->fetchAll();
        }
        $query = $db->prepare(
            'SELECT name, id, lastname, email, phone, birth_date, is_admin FROM users INNER JOIN products_users ON products_users.id_user = users.id WHERE products_users.id_product = :id_product AND (name LIKE :search OR lastname LIKE :search OR email LIKE :search OR phone LIKE :search)'
        );
        $query->execute([
            'id_product' => $_SESSION['user']['id_product'],
            'search' => '%' . $search . '%',
        ]);
        return $query->fetchAll();
    }
    //If the user is a simple user, we return the user
    return [$_SESSION['user']];
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
function userIsGestionnaire()
{
    return false;
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

// Update user data
function updateUser($id, $name, $lastname, $phone, $email, $birth)
{
    global $db;
    $query = $db->prepare(
        'UPDATE users SET name = :name, lastname = :lastname, phone = :phone, email = :email, birth_date = :birth WHERE id = :id'
    );
    try {
        $query->execute([
            'id' => $id,
            'name' => $name,
            'lastname' => $lastname,
            'phone' => $phone,
            'email' => $email,
            'birth' => $birth,
        ]);
        return 1;
    } catch (PDOException $e) {
        return $e->getMessage();
    }
}

function emailExist($email)
{
    global $db;
    $query = $db->prepare('SELECT * FROM users WHERE email = :email');
    $query->execute([
        'email' => $email,
    ]);
    $user = $query->fetch();
    if ($user) {
        return true;
    }
    return false;
}
