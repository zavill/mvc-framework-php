<?php


namespace app\core;


abstract class Controller
{
    public $route;

    public function __construct($route)
    {
        $this->route = $route;
    }
}