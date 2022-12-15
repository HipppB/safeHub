<?php
declare(strict_types=1);
require_once '../vendor/autoload.php';
// if no session start a session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['lang'])) {
    session_start();
    $_SESSION['lang'] = 'fr';
}
header('Expires: Sun, 01 Jan 2014 00:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();
if (!isset($url)) {
    $url = 'index';
}
if (isset($_GET['url']) && !empty($_GET['url']) && !isset($skip)) {
    $url = str_replace(
        ['.html', '.php'],
        '',
        strtolower(htmlspecialchars($_GET['url']))
    );
    $path = explode('/', $url);
    if ($url[-1] === '/') {
        //remove the last character
        $url = substr($url, 0, -1);
        header('Location: ../' . $path[-1]);
    }
}
error_log('url: ' . $url);
require_once 'model/translate.requests.php';

if (file_exists('controller/' . $url . '.php')) {
    // Check if there is a controller
    require 'controller/' . $url . '.php';
} else {
    header('Location: ../404');
}
