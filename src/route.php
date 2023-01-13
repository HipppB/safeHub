<?php
class Route
{
    private $path;
    private $callable;
    private $matches = [];
    private $params = [];

    public function __construct($path)
    {
        $path = str_replace(
            ['.html', '.php'],
            '',
            strtolower(htmlspecialchars($path))
        );
        $this->path = trim($path, '/'); // On retire les / inutils
    }

    public function analyze($path)
    {
        if ($path == '') {
            return 'index';
        }
        return $path;
    }

    public function call()
    {
        if (file_exists('controller/' . $this->analyze($this->path) . '.php')) {
            // Check if there is a controller
            require 'controller/' . $this->analyze($this->path) . '.php';
        } else {
            header('Location: ../404');
        }
        // return call_user_func_array($this->callable, $this->matches);
    }
}
