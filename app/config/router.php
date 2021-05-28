<?php

$router = $di->getRouter();

// Define your routes here
$router->add('/listar-series', 'Serie::listagem');
$router->addPost('/nova-serie', 'Serie::create');
$router->notFound([
    'controller' => 'index',
    'action' => 'notFound'
]);
$router->addGet('/deleta-serie/{id}', 'Serie::delete');
$router->addPost('/editar-serie/{id}', 'Serie::edit');
$router->add("/lista-temporadas/serie/{id}", "Temporada::listagem");

$router->addGet("/deletar-temporada/{id}", "Temporada::delete");
$router->addGet("/nova-temporada/{id}", "Temporada::create");
$router->addPost('/editar-temporada/{idTemporada}/serie/{idSerie}', 'Temporada::edit');



$router->addGet('/novo-episodio/{id}', 'Episodio::create');
$router->addGet('/deletar-episodio/{id}', 'Episodio::delete');
$router->addGet('/assistir-episodio/{id}', 'Episodio::assiste');
$router->handle($_SERVER['REQUEST_URI']);
