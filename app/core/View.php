<?php


namespace app\core;

/**
 * Class View
 * @package app\core
 */
class View
{
    public $route;
    public $path;
    public $layout;

    public function __construct($route) {
        $this->route = $route;
        $this->path = $route['controller'].'/'.$route['action'];

    }

    public function render($title, $params = []) {
        ob_start();
        require 'app/views/'.$this->path.'.php';
        $content = ob_get_clean();
        require 'app/views/layouts/'.Config::BASE_LAYOUT.'.php';
    }
}