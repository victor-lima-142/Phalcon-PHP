<?php

use \Phalcon\Mvc\Router;

$router = new Router(true);
// $router->removeExtraSlashes(true);

$router->add("/", [
    'controller' => 'Index', 'action' => 'index'
]);

return $router;