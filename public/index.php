<?php

require_once __DIR__ . '/../app/core/Database.php';
require_once __DIR__ . '/../app/core/Router.php';
require_once __DIR__ . '/../app/controllers/AuthController.php';
require_once __DIR__ . '/../app/controllers/PersonController.php';

$router = new Router();

// مسیرها
$router->addRoute('GET', '/accounting_app/public/persons', [new PersonController(), 'index']);
$router->addRoute('GET', '/accounting_app/public/persons/create', [new PersonController(), 'create']);
$router->addRoute('POST', '/accounting_app/public/persons/create', [new PersonController(), 'create']);
$router->addRoute('GET', '/accounting_app/public/persons/edit/{id}', [new PersonController(), 'edit']);
$router->addRoute('POST', '/accounting_app/public/persons/edit/{id}', [new PersonController(), 'edit']);
$router->addRoute('GET', '/accounting_app/public/persons/delete/{id}', [new PersonController(), 'delete']);

$router->dispatch();