<?php

require dirname(__DIR__) . '/vendor/autoload.php';


use App\Router;
use App\Controller\HomeController;
use App\Controller\ProductController;


// var_dump(class_exists(ProductController::class));
// die;


$router = new Router();

// Route connectée au controller
$router->get('/', [HomeController::class, 'index']);
$router->get('/products', [ProductController::class, 'index']);
$router->get('/product/{id}', [ProductController::class, 'show']);

// Lancer le routeur
$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
