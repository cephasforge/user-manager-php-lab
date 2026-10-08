<?php

//Classes
require __DIR__ . '\classes\Database.php';
require __DIR__ . '\classes\Router.php';

//Controller
require __DIR__ . '\classes\Controller.php';
require __DIR__ . '\classes\HomeController.php';

$config = require __DIR__ . '\config\database.php';
$pdo = Database::connect($config);

$router = new Router();
require __DIR__ . '\routes.php';
$router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);