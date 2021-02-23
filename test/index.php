<?php

require_once '../vendor/autoload.php';

require_once '../app/lib/develop.php';

use app\core\Router;

$router = new Router();

$router->add('test', ['controller' => 'main', 'action' => 'index']);

$router->dispatch();
