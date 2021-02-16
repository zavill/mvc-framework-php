<?php


namespace app\core;


class Config
{
    /**
     * Конечный массив конфигураций
     * @var array
     */
    private $configs = [];

    public function load()
    {
        $this->configs['routes'] = require 'app/config/routes.php';
        return $this->configs;
    }

}