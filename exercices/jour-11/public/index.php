<?php

require_once __DIR__ . "/../app/Router.php";
require_once __DIR__ . "/../app/Controller/HomeController.php";
require_once __DIR__ . "/../app/Controller/ProductController.php";

$router = new Router();

// Route connectée au controller
$router->get('/', [HomeController::class, 'index']);
$router->get('/products', [ProductController::class, 'index']);
$router->get('/product/{id}', [ProductController::class, 'show']);

// Lancer le routeur
$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
