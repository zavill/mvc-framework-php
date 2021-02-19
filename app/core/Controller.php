<?php


namespace app\core;

abstract class Controller
{
    public $route;
    public $view;
    public $model;

    public function __construct($route)
    {
        $this->route = $route;
        $this->view = new View($route);
        $this->model = $this->loadModel($route['controller']);
    }

    /**
     * Загрузка моделей
     *
     * @param $name
     * @return mixed
     */
    public function loadModel($name)
    {
        $path = 'app\models\\' . ucfirst($name) . 'Model';
        return new $path();
    }
}