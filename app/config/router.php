<?php

$router = $di->getRouter();

// Define your routes here
$router->add('/listar-series', 'Serie::listagem');
$router->addPost('/nova-serie', 'Serie::create');
$router->notFound([
    'controller' => 'index',
    'action' => 'notFound'
]);
$router->handle($_SERVER['REQUEST_URI']);
