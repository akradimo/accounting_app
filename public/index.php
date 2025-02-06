<?php

require_once __DIR__ . '/../app/core/Database.php';
require_once __DIR__ . '/../app/core/Router.php';
require_once __DIR__ . '/../app/controllers/AuthController.php';
require_once __DIR__ . '/../app/controllers/PersonController.php';

$router = new Router();

// مسیرها
$router->addRoute('GET', '/login', [new AuthController(), 'login']);
$router->addRoute('POST', '/login', [new AuthController(), 'login']);
$router->addRoute('GET', '/register', [new AuthController(), 'register']);
$router->addRoute('POST', '/register', [new AuthController(), 'register']);
$router->addRoute('GET', '/logout', [new AuthController(), 'logout']);

$router->addRoute('GET', '/persons', [new PersonController(), 'index']);
$router->addRoute('GET', '/persons/create', [new PersonController(), 'create']);
$router->addRoute('POST', '/persons/create', [new PersonController(), 'create']);
$router->addRoute('GET', '/persons/edit/{id}', [new PersonController(), 'edit']);
$router->addRoute('POST', '/persons/edit/{id}', [new PersonController(), 'edit']);
$router->addRoute('GET', '/persons/delete/{id}', [new PersonController(), 'delete']);

$router->dispatch();