<?php

namespace app\core;

/**
 * Class Router
 * @package app\core
 */
class Router
{

    /**
     * Пути
     * @var array
     */
    protected $routes = [];

    /**
     * Параметры
     * @var array
     */
    protected $params = [];

    public function __construct()
    {
        $config = (new Config())->load();
        foreach ($config['routes'] as $route => $param) {
            $this->add($route, $param);
        }
    }

    /**
     * Запись путей в переменную
     *
     * @param $route
     * @param $params
     */
    public function add($route, $params)
    {
        $route = '#^' . $route . '$#';
        $this->routes[$route] = $params;
    }

    /**
     * Проверка маршрутов
     */
    public function check(): bool
    {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    /**
     * Запуск маршрутов
     */
    public function run()
    {
        if ($this->check()) {
            $className = 'app\controllers\\' . ucfirst($this->params['controller']) . 'Controller';
            if (class_exists($className)) {
                $action = $this->params['action'] . 'Action';
                if (method_exists($className, $action)) {
                    $controller = new $className($this->params);
                    $controller->$action();
                } else {
                    die('Экшен ' . $action . ' не найден');
                }
            } else {
                die('Контроллер ' . $className . ' не найден');
            }
        } else {
            echo '404';
        }
        //
    }
}