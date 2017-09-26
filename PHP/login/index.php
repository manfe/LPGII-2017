<?php

require('start.php');

use App\controllers\NotFoundController as NotFoundController;

$path = '/';

if (isset($_SERVER['PATH_INFO'])) {
    $path = $_SERVER['PATH_INFO'];
}

$routes = [
    '/' => ['class' => 'App\controllers\HomeController', 'method' => 'index'],
    '/users/sign_in' => ['class' => 'App\controllers\UsersController', 'method' => 'signIn'],
    '/users/login' => ['class' => 'App\controllers\UsersController', 'method' => 'login'],
    '/users/sign_up' => ['class' => 'App\controllers\UsersController', 'method' => 'cadastro'],
    '/users/cadastrar' => ['class' => 'App\controllers\UsersController', 'method' => 'cadastrar'],
    '/users/sign_out' => ['class' => 'App\controllers\UsersController', 'method' => 'signOut'],
    '/users/recover_form' => ['class' => 'App\controllers\UsersController', 'method' => 'recoverForm'],
    '/users/recover' => ['class' => 'App\controllers\UsersController', 'method' => 'recover'],
    '/users/new_password_form' => ['class' => 'App\controllers\UsersController', 'method' => 'newPasswordForm'],
    '/users/new_password' => ['class' => 'App\controllers\UsersController', 'method' => 'newPassword'],
    '/dashboard' => ['class' => 'App\controllers\DashboardController', 'method' => 'index'],
];


if ($routes[$path]) {
    $class = $routes[$path]['class'];
    $method = $routes[$path]['method'];

    $klass = new $class();
    return $klass->$method();
}

return (new NotFoundController())->index();



