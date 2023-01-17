<?php
declare(strict_types=1);
require_once '../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();
require_once 'model/translate.requests.php';
require_once 'router.php';
require_once 'route.php';
// if no session start a session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'fr';
}
header('Expires: Sun, 01 Jan 2014 00:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

$router = new Router($_GET['url'] ?? '', $_GET['action'] ?? '', $_GET);

$router->get($_GET['url'] ?? '');

$router->run();

?>
