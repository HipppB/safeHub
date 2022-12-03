<?php
header('Expires: Sun, 01 Jan 2014 00:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', FALSE);
header('Pragma: no-cache');
$url = 'index';  
if((isset($_GET['url']) && !empty($_GET['url']))) {
    $url = str_replace([".html", ".php"], "", strtolower(htmlspecialchars($_GET['url'])));
    $path = explode("/", $url);
    if($url[-1] === "/") {
        //remove the last character
        $url = substr($url, 0, -1);
        header('Location: ../'.$path[-1]);
    }
} 

if(file_exists('controller/' . $url . '.php')) { // Check if there is a controller
    require 'controller/' . $url . '.php';
} else {
    header('Location: ../404');
}

echo htmlspecialchars($_GET["name"]);