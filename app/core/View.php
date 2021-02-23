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

    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $route['controller'] . '/' . $route['action'];
    }

    public function render($title, $params = [])
    {
        require 'app/views/layouts/' . Config::BASE_LAYOUT . '/header.php';
        require 'app/views/' . $this->path . '.php';
        require 'app/views/layouts/' . Config::BASE_LAYOUT . '/footer.php';
    }

    /**
     * Рендеринг ошибки 404
     */
    public static function render404()
    {
        http_response_code(404);
        require 'app/views/404.php';
    }
}