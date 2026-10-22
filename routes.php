<?php
$router->add('GET', '/', [HomeController::class, 'home']);
$router->add('GET', '/home', [HomeController::class, 'home']);
$router->add('GET', '/signin', [HomeController::class, 'signin']);
$router->add('GET', '/signup', [HomeController::class, 'signup']);

$router->add('POST', '/signup', [HomeController::class, 'signup']);
$router->add('POST', '/signin', [HomeController::class, 'signin']);

$router->add('GET', '/user-home', [UserController::class, 'userHome']);
$router->add('GET', '/logout', [UserController::class, 'userLogout']);

$router->add('POST', '/user', [UserController::class, 'userRead']);
