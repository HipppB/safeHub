<?php
// listen action to change langage of the session
if (isset($_GET['action']) && $_GET['action'] == 'changeLang') {
    if (isset($_GET['lang']) && $_GET['lang'] == 'fr') {
        $_SESSION['lang'] = 'fr';
    } else {
        $_SESSION['lang'] = 'en';
    }
    if (isset($_GET['path'])) {
        $scan = scandir('.');
        error_log($_SERVER['DOCUMENT_ROOT']);
        foreach ($scan as $file) {
            if (!is_dir("myFolder/$file")) {
                error_log($file);
            }
        }
        if (str_contains($_GET['path'], '.') == false) {
            $url = $_GET['path'];
            if ($url == '/') {
                $url = 'index';
            }
            error_log('url: ' . $url);
            $skip = true;
            require 'index.php';
        }
    }
}
