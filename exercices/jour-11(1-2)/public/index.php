<?php

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "app" . DIRECTORY_SEPARATOR . "Router.php";


$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

$router = new Router();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">


    <title>Document</title>
</head>

<pre>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3">
                <h2 class="text-center">$_SERVER</h2>
                <?= var_dump($_SERVER) ?>
            </div>
            <div class="col-md-3">
                <h2 class="text-center">$_GET</h2>
                <?= var_dump($_GET) ?>
            </div>
            <div class="col-md-3">
                <h2 class="text-center">$_POST</h2>
                <?= var_dump($_POST) ?>
            </div>
            <div class="col-md-3">
                <h2 class="text-center">$router</h2>
                <?= var_dump($router) ?>
            </div>
        </div>
    </div>
</pre>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <h1 class="text-center mb-3">EX1 : FRONT CONTROLER</h1>
                <p class="text-center">$_SERVER['REQUEST_URI'] : <strong><?= $uri ?></strong></p>
                <p class="text-center">$_SERVER['REQUEST_METHOD'] : <strong><?= $method ?></strong></p>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <h1 class="text-center mb-3">EX2 : ROUTER</h1>
                <p class="text-center">
                    /accueil :
                    <strong>
                        <?php
                        $router->get('/', function () {
                            echo "Accueil";
                        });
                        ?>
                    </strong>
                </p>
                <p class="text-center">
                    /about :
                    <strong>
                        <?php
                        $router->get('/about', function () {
                            echo "À propos";
                        });
                        ?>
                    </strong>
                </p>
                <p class="text-center">
                    /contact (GET) :
                    <strong>
                        <?php
                        $router->get('/contact', function () {
                            echo "Page contact (GET)";
                        });
                        ?>
                    </strong>
                </p>
                <p class="text-center">
                    /contact (POST) :
                    <strong>
                        <?php
                        $router->post('/contact', function () {
                            echo "Formulaire envoyé !";
                        });
                        ?>
                    </strong>
                </p>
            </div>
        </div>
        <?php
        // Lancer le routeur
        $router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>

</html>