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
            'SELECT name, id, lastname, email, phone, birth_date, is_admin, is_banned FROM users WHERE id = :id'
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

function getUsers($search = null, $productid = null)
{
    //If the user is admin we return all users
    if (userIsAdmin()) {
        global $db;
        $query;
        if (empty($search)) {
            if (empty($productid)) {
                $query = $db->prepare(
                    'SELECT  name, id, lastname, email, phone, birth_date, is_admin, is_banned FROM users'
                );
                $query->execute();
            } else {
                $query = $db->prepare(
                    'SELECT users.id, users.name, users.lastname, users.email, users.phone, users.birth_date, users.is_admin, is_banned FROM users INNER JOIN products_users ON users.id = products_users.id_user WHERE products_users.id_product = :id_product'
                );
                $query->execute([
                    'id_product' => $productid,
                ]);
            }

            return $query->fetchAll();
        }
        if (empty($productid)) {
            $query = $db->prepare(
                'SELECT name, id, lastname, email, phone, birth_date, is_admin, is_banned FROM users WHERE name LIKE :search OR lastname LIKE :search OR email LIKE :search OR phone LIKE :search'
            );
            $query->execute([
                'search' => '%' . $search . '%',
            ]);
        } else {
            $query = $db->prepare(
                'SELECT users.id, users.name, users.lastname, users.email, users.phone, users.birth_date, users.is_admin, is_banned FROM users INNER JOIN products_users ON users.id = products_users.id_user WHERE products_users.id_product = :id_product AND (users.name LIKE :search OR users.lastname LIKE :search OR users.email LIKE :search OR users.phone LIKE :search)'
            );
            $query->execute([
                'search' => '%' . $search . '%',
                'id_product' => $productid,
            ]);
        }

        return $query->fetchAll();
    }
    //If the user is gestionnaire on a product, we return all users of this product
    if (userIsGestionnaire()) {
        // Get all users of all products where the user is gestionnaire
        global $db;
        $query = $db->prepare(
            'SELECT users.id, users.name, users.lastname, users.email, users.phone, users.birth_date, users.is_admin, is_banned FROM users INNER JOIN products_users ON users.id = products_users.id_user WHERE products_users.id_product = :id_product AND products_users.is_gestionnaire = 1'
        );
        $query->execute([
            'id_product' => $productid,
        ]);
        return $query->fetchAll();
    }
    //If the user is a simple user, we return the user
    return [$_SESSION['user']];
}
function loginUser($email, $password)
{
    $user = getUserByEmail($email);
    if ($user && $user['is_banned'] == 0) {
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
function userIsGestionnaire($productId = null)
{
    // Check in user_product database if there is a product with the user id
    if (isset($_SESSION['user']['id'])) {
        global $db;
        $query;
        if (isset($productId)) {
            $query = $db->prepare(
                'SELECT * FROM products_users WHERE id_user = :id_user AND is_gestionnaire = "1" AND id_product = :id_product'
            );
            $query->execute([
                'id_user' => $_SESSION['user']['id'],
                'id_product' => $productId,
            ]);
            $products = $query->fetchAll();
            if (count($products) > 0) {
                return true;
            }
        } else {
            $query = $db->prepare(
                'SELECT * FROM products_users WHERE id_user = :id_user AND is_gestionnaire = "1"'
            );
            $query->execute([
                'id_user' => $_SESSION['user']['id'],
            ]);
            $products = $query->fetchAll();
            if (count($products) > 0) {
                return true;
            }
        }
    }
    // if user can be gestionnaire and user, it depends on the product, so we need the product id.
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

function promoteToAdmin($id)
{
    if (!userIsAdmin()) {
        return false;
    }
    global $db;
    $query = $db->prepare('UPDATE users SET is_admin = 1 WHERE id = :id');
    try {
        $query->execute([
            'id' => $id,
        ]);
        return true;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return false;
}

function promoteToGestionnaire($id, $id_product)
{
    if (!userIsAdmin()) {
        return false;
    }
    global $db;
    // Check if the user is on the product

    $query = $db->prepare(
        'SELECT * FROM products_users WHERE id_user = :id_user AND id_product = :id_product'
    );
    $query->execute([
        'id_user' => $id,
        'id_product' => $id_product,
    ]);
    $user = $query->fetch();
    if ($user) {
        $query = $db->prepare(
            'UPDATE products_users SET is_gestionnaire = 1 WHERE id_user = :id_user AND id_product = :id_product'
        );
        try {
            $query->execute([
                'id_user' => $id,
                'id_product' => $id_product,
            ]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    } else {
        $query = $db->prepare(
            'INSERT INTO products_users (id_user, id_product, is_gestionnaire) VALUES (:id_user, :id_product, 1)'
        );
        try {
            $query->execute([
                'id_user' => $id,
                'id_product' => $id_product,
            ]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    return false;
}
function demoteGestionnaire($id, $id_product)
{
    if (!userIsAdmin()) {
        return false;
    }
    global $db;
    $query = $db->prepare(
        'UPDATE products_users SET is_gestionnaire = 0 WHERE id_user = :id_user AND id_product = :id_product'
    );
    try {
        $query->execute([
            'id_user' => $id,
            'id_product' => $id_product,
        ]);
        return true;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return false;
}

function toggleUserGestionnaire($id, $id_product)
{
    if (!userIsAdmin()) {
        return false;
    }
    global $db;
    // Check if the user is on the product

    $query = $db->prepare(
        'SELECT * FROM products_users WHERE id_user = :id_user AND id_product = :id_product'
    );
    $query->execute([
        'id_user' => $id,
        'id_product' => $id_product,
    ]);
    $user = $query->fetch();
    if ($user) {
        $query = $db->prepare(
            'UPDATE products_users SET is_gestionnaire = NOT is_gestionnaire WHERE id_user = :id_user AND id_product = :id_product'
        );
        try {
            $query->execute([
                'id_user' => $id,
                'id_product' => $id_product,
            ]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    } else {
        $query = $db->prepare(
            'INSERT INTO products_users (id_user, id_product, is_gestionnaire) VALUES (:id_user, :id_product, 1)'
        );
        try {
            $query->execute([
                'id_user' => $id,
                'id_product' => $id_product,
            ]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    return false;
}
function demoteAdmin($id)
{
    if (!userIsAdmin()) {
        return false;
    }
    global $db;
    $query = $db->prepare('UPDATE users SET is_admin = 0 WHERE id = :id');
    try {
        $query->execute([
            'id' => $id,
        ]);
        return true;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return false;
}

function banUser($id)
{
    if (!userIsAdmin()) {
        return false;
    }
    global $db;
    $query = $db->prepare('UPDATE users SET is_banned = 1 WHERE id = :id');
    try {
        $query->execute([
            'id' => $id,
        ]);
        return true;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return false;
}
function unbanUser($id)
{
    if (!userIsAdmin()) {
        return false;
    }
    global $db;
    $query = $db->prepare('UPDATE users SET is_banned = 0 WHERE id = :id');
    try {
        $query->execute([
            'id' => $id,
        ]);
        return true;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return false;
}
function deleteUser($id)
{
    if (!userIsAdmin()) {
        return false;
    }
    global $db;
    $query = $db->prepare('DELETE FROM users WHERE id = :id');
    try {
        $query->execute([
            'id' => $id,
        ]);
        return true;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return false;
}

function deleteUserFromProduct($id, $id_product)
{
    if (!userIsAdmin() && !userIsGestionnaire($id_product)) {
        return false;
    }
    global $db;
    $query = $db->prepare(
        'DELETE FROM products_users WHERE id_user = :id_user AND id_product = :id_product'
    );
    try {
        $query->execute([
            'id_user' => $id,
            'id_product' => $id_product,
        ]);
        return true;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return false;
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

function toggleUserBan($id)
{
    if (!userIsAdmin()) {
        return false;
    }
    global $db;
    $query = $db->prepare('SELECT * FROM users WHERE id = :id');
    $query->execute([
        'id' => $id,
    ]);
    $user = $query->fetch();
    if ($user) {
        if ($user['is_banned']) {
            $query = $db->prepare(
                'UPDATE users SET is_banned = 0 WHERE id = :id'
            );
            try {
                $query->execute([
                    'id' => $id,
                ]);
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        } else {
            $query = $db->prepare(
                'UPDATE users SET is_banned = 1 WHERE id = :id'
            );
            try {
                $query->execute([
                    'id' => $id,
                ]);
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
    return false;
}

function toggleAdmin($id)
{
    if (!userIsAdmin()) {
        return false;
    }
    global $db;
    $query = $db->prepare('SELECT * FROM users WHERE id = :id');
    $query->execute([
        'id' => $id,
    ]);
    $user = $query->fetch();
    if ($user) {
        if ($user['is_admin']) {
            $query = $db->prepare(
                'UPDATE users SET is_admin = 0 WHERE id = :id'
            );
            try {
                $query->execute([
                    'id' => $id,
                ]);
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        } else {
            $query = $db->prepare(
                'UPDATE users SET is_admin = 1 WHERE id = :id'
            );
            try {
                $query->execute([
                    'id' => $id,
                ]);
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
    return false;
}
