<?php

namespace fw\core\base;

abstract class Controller
{
    public $route = [];
    public $view;
    public $layout;
    public $vars = [];
    public function __construct($route)
    {
        $this->route = $route;
        $this->view = $route['action'];
    }
    public function getView()
    {
        $vObj = new View($this->route, $this->layout, $this->view);
        $vObj->render($this->vars);
    }
    public function set($vars)
    {
        $this->vars = $vars;
    }

    public function isAjax()
    {
        return isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && $_SERVER["HTTP_X_REQUESTED_WITH"] === 'XMLHttpRequest';
    }
    public function loadView($view, $vars = [])
    {
        $file = APP . "/views/{$this->route['controller']}/{$view}.php";
        if (is_file($file)) {
            extract($vars);
            require $file;
        } else {
            echo "file: <b>{$file}</b> wasn't found";
        }
    }
}