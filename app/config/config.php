<?php

defined('APP_PATH') || define('APP_PATH', realpath('.'));

return new \Phalcon\Config([
    'database' => [
        'adapter' => 'Mysql',
        'host' => '127.0.0.1',
        'username' => 'root',
        'password' => '',
        'dbname' => 'phalcon_php',
        'charset' => 'utf8',
    ],
    'application' => [
        'controllersDir' => APP_PATH . '/app/controllers/',
        'modelsDir' => APP_PATH . '/app/models/',
        'migrationsDir' => APP_PATH . '/app/migrations/',
        'viewsDir' => APP_PATH . '/app/views/',
        'pluginsDir' => APP_PATH . '/app/plugins/',
        'libraryDir' => APP_PATH . '/app/library/',
        'cacheDir' => APP_PATH . '/app/cache/',
        'baseUri' => '/',
    ]
]);
