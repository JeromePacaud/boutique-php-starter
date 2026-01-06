<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$title = "page-catalogue";

$products = [
    [
        "image" => "./img/clavier.jpg",
        "name" => "clavier",
        "description" => "un super clavier.",
        "price" => 49.99,
        "rating" => 5,
        "stock" => 50
    ],
    [
        "image" => "./img/ecran.jpg",
        "name" => "écran",
        "description" => "un superbe écran.",
        "price" => 149.99,
        "rating" => 4.5,
        "stock" => 15
    ],
    [
        "image" => "./img/souris.jpg",
        "name" => "souris",
        "description" => "une superbe souris.",
        "price" => 69.99,
        "rating" => 3.5,
        "stock" => 60
    ],
    [
        "image" => "./img/tapis.jpg",
        "name" => "tapis",
        "description" => "un tapis de souris",
        "price" => 39.99,
        "rating" => 5,
        "stock" => 18
    ],
    [
        "image" => "./img/tour.jpg",
        "name" => "tour gaming",
        "description" => "vendue sans le chat",
        "price" => 999.99,
        "rating" => 5,
        "stock" => 45
    ],
    [
        "image" => "./img/setup.jpg",
        "name" => "setup complet",
        "description" => "un setup gaming complet",
        "price" => 1249.99,
        "rating" => 5,
        "stock" => 3
    ],
]
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <title><?= $title ?></title>

    <style>
        img {
            aspect-ratio: 4/3;
        }
    </style>
</head>

<body>
    <div class="container mt-5 mb-5">
        <h1 class="mb-5 text-center"> Nos Produits </h2>
            <div class="row g-5">

                <div class="col-md-4">
                    <div class="card">
                        <img src="<?= $products[0]["image"] ?>" class="card-img-top" alt="Product Image">
                        <div class="card-body">
                            <h5 class="card-title"><?= ucfirst($products[0]["name"]) ?></h5>
                            <p class="card-text"><?= ucfirst($products[0]["description"]) ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="h5 mb-0"><?= $products[0]["price"] ?>€</span>
                                <?php if ($products[0]["stock"] > 0): ?>
                                    <span class="h5 mb-0">En stock: <?= $products[0]["stock"] ?></span>
                                <?php else: ?>
                                    <span class="h5 mb-0 text-danger">Rupture de stock</span>
                                <?php endif ?>
                                <span class="h5 mb-0 text-muted"><?= $products[0]["rating"] ?></span>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light">
                            <button class="btn btn-primary btn-md">Add to Cart</button>
                            <button class="btn btn-outline-secondary btn-md">Ajouter à la liste de souhait</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <img src="<?= $products[1]["image"] ?>" class="card-img-top" alt="Product Image">
                        <div class="card-body">
                            <h5 class="card-title"><?= ucfirst($products[1]["name"]) ?></h5>
                            <p class="card-text"><?= ucfirst($products[1]["description"]) ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="h5 mb-0"><?= $products[1]["price"] ?>€</span>
                                <?php if ($products[1]["stock"] > 0): ?>
                                    <span class="h5 mb-0">En stock: <?= $products[1]["stock"] ?></span>
                                <?php else: ?>
                                    <span class="h5 mb-0 text-danger">Rupture de stock</span>
                                <?php endif ?>
                                <span class="h5 mb-0 text-muted"><?= $products[1]["rating"] ?></span>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light">
                            <button class="btn btn-primary btn-md">Add to Cart</button>
                            <button class="btn btn-outline-secondary btn-md">Ajouter à la liste de souhait</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <img src="<?= $products[2]["image"] ?>" class="card-img-top" alt="Product Image">
                        <div class="card-body">
                            <h5 class="card-title"><?= ucfirst($products[2]["name"]) ?></h5>
                            <p class="card-text"><?= ucfirst($products[2]["description"]) ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="h5 mb-0"><?= $products[2]["price"] ?>€</span>
                                <?php if ($products[2]["stock"] > 0): ?>
                                    <span class="h5 mb-0">En stock: <?= $products[2]["stock"] ?></span>
                                <?php else: ?>
                                    <span class="h5 mb-0 text-danger">Rupture de stock</span>
                                <?php endif ?>
                                <span class="h5 mb-0 text-muted"><?= $products[2]["rating"] ?></span>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light">
                            <button class="btn btn-primary btn-md">Add to Cart</button>
                            <button class="btn btn-outline-secondary btn-md">Ajouter à la liste de souhait</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <img src="<?= $products[3]["image"] ?>" class="card-img-top" alt="Product Image">
                        <div class="card-body">
                            <h5 class="card-title"><?= ucfirst($products[3]["name"]) ?></h5>
                            <p class="card-text"><?= ucfirst($products[3]["description"]) ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="h5 mb-0"><?= $products[3]["price"] ?>€</span>
                                <?php if ($products[3]["stock"] > 0): ?>
                                    <span class="h5 mb-0">En stock: <?= $products[3]["stock"] ?></span>
                                <?php else: ?>
                                    <span class="h5 mb-0 text-danger">Rupture de stock</span>
                                <?php endif ?>
                                <span class="h5 mb-0 text-muted"><?= $products[3]["rating"] ?></span>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light">
                            <button class="btn btn-primary btn-md">Add to Cart</button>
                            <button class="btn btn-outline-secondary btn-md">Ajouter à la liste de souhait</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <img src="<?= $products[4]["image"] ?>" class="card-img-top" alt="Product Image">
                        <div class="card-body">
                            <h5 class="card-title"><?= ucfirst($products[4]["name"]) ?></h5>
                            <p class="card-text"><?= ucfirst($products[4]["description"]) ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="h5 mb-0"><?= $products[4]["price"] ?>€</span>
                                <?php if ($products[4]["stock"] > 0): ?>
                                    <span class="h5 mb-0">En stock: <?= $products[4]["stock"] ?></span>
                                <?php else: ?>
                                    <span class="h5 mb-0 text-danger">Rupture de stock</span>
                                <?php endif ?>
                                <span class="h5 mb-0 text-muted"><?= $products[4]["rating"] ?></span>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light">
                            <button class="btn btn-primary btn-md">Add to Cart</button>
                            <button class="btn btn-outline-secondary btn-md">Ajouter à la liste de souhait</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <img src="<?= $products[5]["image"] ?>" class="card-img-top" alt="Product Image">
                        <div class="card-body">
                            <h5 class="card-title"><?= ucfirst($products[5]["name"]) ?></h5>
                            <p class="card-text"><?= ucfirst($products[5]["description"]) ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="h5 mb-0"><?= $products[5]["price"] ?>€</span>
                                <?php if ($products[5]["stock"] > 0): ?>
                                    <span class="h5 mb-0">En stock: <?= $products[5]["stock"] ?></span>
                                <?php else: ?>
                                    <span class="h5 mb-0 text-danger">Rupture de stock</span>
                                <?php endif ?>
                                <span class="h5 mb-0 text-muted"><?= $products[5]["rating"] ?></span>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light">
                            <button class="btn btn-primary btn-md">Add to Cart</button>
                            <button class="btn btn-outline-secondary btn-md">Ajouter à la liste de souhait</button>
                        </div>
                    </div>
                </div>

            </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>