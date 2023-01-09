<?php
class Router
{
    private $url; // Contiendra l'URL sur laquelle on souhaite se rendre
    private $routes = []; // Contiendra la liste des routes

    public function __construct($url)
    {
        $this->url = $url;
    }
    public function get($path)
    {
        $route = new Route($path);
        $this->routes[] = $route;
        return $route;
    }
    public function run()
    {
        return end($this->routes)->call();
    }
}
