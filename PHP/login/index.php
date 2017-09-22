<?php

require('start.php');

$path = '/';

if (isset($_SERVER['PATH_INFO'])) {
    $path = $_SERVER['PATH_INFO'];
}

$routes = [
    '/' => ['class' => 'App\controllers\HomeController', 'method' => 'index'],
    '/sign_in' => ['class' => 'App\controllers\UsersController', 'method' => 'sign_in']
];


if ($routes[$path]) {
    $class = $routes[$path]['class'];
    $method = $routes[$path]['method'];

    $klass = new $class();
    return $klass->$method();
}



