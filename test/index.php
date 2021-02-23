<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/app/lib/develop.php';

use app\core\Router;

$router = new Router();

$router->add('test/doubleTest', ['controller' => 'main', 'action' => 'index']);

$router->dispatch();
