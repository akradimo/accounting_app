<?php

require_once __DIR__ . '/../app/core/Database.php';
require_once __DIR__ . '/../app/core/Router.php';
require_once __DIR__ . '/../app/controllers/AuthController.php';

$router = new Router();

// مسیرها
$router->addRoute('GET', '/login', [new AuthController(), 'login']);
$router->addRoute('POST', '/login', [new AuthController(), 'login']);
$router->addRoute('GET', '/register', [new AuthController(), 'register']);
$router->addRoute('POST', '/register', [new AuthController(), 'register']);
$router->addRoute('GET', '/logout', [new AuthController(), 'logout']);

$router->dispatch();