<?php
// Connect to db
function connectDb() {
    try {

        // $bdd = new PDO('mysql:host=localhost:8889;dbname=mvc;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        $db = new PDO("mysql:host=".$_ENV["DATABASE_HOST"].";dbname=".$_ENV["DATABASE_NAME"].";charset=utf8", $_ENV["DATABASE_USER"], $_ENV["DATABASE_PASSWORD"]);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (PDOException $e) {
        echo "Erreur de connexion à la base de données";
        die();
    }
}
