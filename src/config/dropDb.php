<?php
//Drops all databases to start from scratch
/** @var  PDO $db */
$dropNotifUsers = $db->prepare('DROP TABLE IF EXISTS notifications_users');
$dropTipsUsers = $db->prepare('DROP TABLE IF EXISTS tips_users');
$dropProductsUsers = $db->prepare('DROP TABLE IF EXISTS products_users');
$dropMetrics = $db->prepare('DROP TABLE IF EXISTS metrics');
$dropNotif = $db->prepare('DROP TABLE IF EXISTS notifications');
$dropProducts = $db->prepare('DROP TABLE IF EXISTS products');
$dropTips = $db->prepare('DROP TABLE IF EXISTS tips');
$dropTranslations = $db->prepare('DROP TABLE IF EXISTS translations');
$dropTypes = $db->prepare('DROP TABLE IF EXISTS types');
$dropUsers = $db->prepare('DROP TABLE IF EXISTS users');
$dropRoles = $db->prepare('DROP TABLE IF EXISTS roles');
$dropResetPassword = $db->prepare('DROP TABLE IF EXISTS reset_password');
try {
    $dropNotifUsers->execute();
    $dropTipsUsers->execute();
    $dropProductsUsers->execute();
    $dropMetrics->execute();
    $dropNotif->execute();
    $dropProducts->execute();
    $dropTips->execute();
    $dropTranslations->execute();
    $dropTypes->execute();
    $dropUsers->execute();
    $dropRoles->execute();
    $dropResetPassword->execute();

    echo 'Database cleaned' . PHP_EOL;
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage() . PHP_EOL;
}
