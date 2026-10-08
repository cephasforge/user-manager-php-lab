<?php
$router->add('GET', '/', [HomeController::class, 'home']);
$router->add('GET', '/home', [HomeController::class, 'home']);
$router->add('GET', '/signin', [HomeController::class, 'signin']);
$router->add('GET', '/signup', [HomeController::class, 'signup']);