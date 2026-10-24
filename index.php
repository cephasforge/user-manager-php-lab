<?php
require __DIR__ . '\classes\Database.php';
require __DIR__ . '\classes\Router.php';


require __DIR__ . '\classes\Controller.php';
require __DIR__ . '\classes\HomeController.php';

require __DIR__ . '\classes\User.php';
require __DIR__ . '\classes\UserController.php';
require __DIR__ . '\classes\UserRepository.php';


$router = new Router();
require __DIR__ . '\routes.php';
$router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);