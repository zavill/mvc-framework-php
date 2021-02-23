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
     *
     * @var array
     */
    protected $routes = [];

    /**
     * Параметры
     *
     * @var array
     */
    protected $params = [];

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
     *
     * @return bool
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
    public function dispatch()
    {
        if ($this->check()) {
            $className = 'app\controllers\\' . ucfirst($this->params['controller']) . 'Controller';
            if (class_exists($className)) {
                $action = $this->params['action'] . 'Action';
                if (method_exists($className, $action)) {
                    $controller = new $className($this->params);
                    $controller->$action();
                } else {
                    View::render404();
                    //@todo: логирование ошибки экшена
                }
            } else {
                View::render404();
                //@todo: логирование ошибки контроллера
            }
        } else {
            View::render404();
        }
    }
}
