<?php
use \Phalcon\Mvc\Router;

$router = new Router();
$router->removeExtraSlashes(true);

$router->notFound(array('controller' => 'Index', 'action'=>'notFound'));

$router->add("/", array( "controller" => "Index", "action"     => "index"))->setName('index.index');

return $router;