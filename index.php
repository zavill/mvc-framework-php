<?php

require 'app/lib/develop.php';

use app\core\Router;

spl_autoload_register(
    function ($class) {
        $path = str_replace('\\', '/', $class . '.php');
        if (file_exists($path)) {
            require $path;
        }
    }
);

$router = new Router();

$router->add('', ['controller' => 'main', 'action' => 'index']);

$router->dispatch();
