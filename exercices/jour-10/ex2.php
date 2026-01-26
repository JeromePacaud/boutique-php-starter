<?php

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "jour-10" . DIRECTORY_SEPARATOR . "BDD" . DIRECTORY_SEPARATOR . "config.php";
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "jour-10" . DIRECTORY_SEPARATOR  . "Repository" . DIRECTORY_SEPARATOR . "ProductRepository.php";

$productRepo = new ProductRepository(($pdo));

$products1 = [
    $productRepo->find(11),
    $productRepo->find(20),
];

$products2 = $productRepo->findAll();

// ---------- Tests ---------- //

// Créer un produit
$newProduct = new Product(
    id: 31,
    name: "Buff",
    description: "un buff de la marque Buff",
    price: 19.99,
    stock: 100,
    category: new Category(
        9,
        "Accessoire de ski",
        "Accessoire pour le ski"
    ),
);
$productRepo->save($newProduct);

// // Modifier
// $newProduct->setPrice(24.99);
// $productRepo->update($newProduct);

// Supprimer
$productRepo->delete(11);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <title>Repository Pattern</title>
</head>

<body>

    <div class="container">
        <h1 class="h1 text-center mt-5">Repository Pattern</h1>
    </div>

    <h2 class="h2 text-center mt-5">CRUD</h2>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card">
                    <img src="https://placehold.co/100x100" class="card-img-top" alt="Produit">
                    <div class="card-body">
                        <h5 class="card-title"><?= $newProduct->getName() ?> - <?= $newProduct->getCategory()->getName() ?></h5>
                        <p class="card-text"><?= $newProduct->getDescription() ?></p>
                        <p class="card-text fw-bold"><?= $newProduct->getPrice() ?> €</p>
                        <a href="#" class="btn btn-primary w-100">Ajouter au panier</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr class="hr">

    <h2 class="h2 text-center mt-5">find()</h2>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <?php foreach ($products1 as $product): ?>
                <div class="col-md-3">
                    <div class="card">
                        <img src="https://placehold.co/100x100" class="card-img-top" alt="Produit">
                        <div class="card-body">
                            <h5 class="card-title"><?= $product->getName() ?> - <?= $product->getCategory()->getName() ?></h5>
                            <p class="card-text"><?= $product->getDescription() ?></p>
                            <p class="card-text fw-bold"><?= $product->getPrice() ?> €</p>
                            <a href="#" class="btn btn-primary w-100">Ajouter au panier</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <hr class="hr">

        <h2 class="h2 text-center mt-5">findAll()</h2>
        <div class="container mt-5">
            <div class="row">
                <?php foreach ($products2 as $product): ?>
                    <div class="col-md-3">
                        <div class="card">
                            <img src="https://placehold.co/100x100" class="card-img-top" alt="Produit">
                            <div class="card-body">
                                <h5 class="card-title"><?= $product->getName() ?> - <?= $product->getCategory()->getName() ?></h5>
                                <p class="card-text"><?= $product->getDescription() ?></p>
                                <p class="card-text fw-bold"><?= $product->getPrice() ?> €</p>
                                <a href="#" class="btn btn-primary w-100">Ajouter au panier</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>