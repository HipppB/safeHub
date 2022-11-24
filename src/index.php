<?php
header('Expires: Sun, 01 Jan 2014 00:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', FALSE);
header('Pragma: no-cache');

if(isset($_GET['url']) && !empty($_GET['url'])) {
    $url = str_replace([".html", ".php"], "", strtolower(htmlspecialchars($_GET['url'])));
} else {
    $url = 'index';
}

if(file_exists('controller/' . $url . '.php')) {
    include('controller/' . $url . '.php');
} else {
    include('controller/404.php');
}
