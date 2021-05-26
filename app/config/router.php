<?php

use \Phalcon\Mvc\Router;

$router = new Router(true);

$router->setDefaultController('SerieController');

$router->addGet("/listar-serie", ['Controller' => 'serie', 'action' => 'listagem']);
$router->addGet("/", ['Controller' => 'serie', 'action' => 'listagem']);
return $router;