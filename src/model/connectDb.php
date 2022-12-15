<?php
// Connect to db
function connectDb() {
    try {

         $db = new PDO('mysql:host=192.168.0.50:3306;dbname=safeHub;charset=utf8', 'admin', 'password', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

//        $db = new PDO("mysql:host=".$_ENV["MYSQL_HOST"].";dbname=".$_ENV["MYSQL_DATABASE"].";charset=utf8", $_ENV["MYSQL_USER"], $_ENV["MYSQL_PASSWORD"]);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (PDOException $e) {
        echo "Erreur de connexion à la base de données";
        die();
    }
}
