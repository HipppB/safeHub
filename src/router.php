<?php
class Router
{
    private $url;
    private $routes = [];
    private $action;
    private $get;

    public function __construct($url, $action, $get)
    {
        $this->url = $url;
        if (isset($action) && $action != '') {
            $this->action = $action;
        }
        if ($get) {
            $this->get = $get;
        }
        if ($this->action == 'changeLang' && $this->get['lang']) {
            $this->changeLang($this->get['lang']);
        }
    }
    public function changeLang($lang)
    {
        if ($lang == 'fr') {
            $_SESSION['lang'] = 'fr';
        } else {
            $_SESSION['lang'] = 'en';
        }
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
