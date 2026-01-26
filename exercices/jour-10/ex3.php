<?php

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "jour-10" . DIRECTORY_SEPARATOR . "BDD" . DIRECTORY_SEPARATOR . "config.php";
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "jour-10" . DIRECTORY_SEPARATOR  . "Repository" . DIRECTORY_SEPARATOR . "ProductRepository.php";

$productRepo = new ProductRepository(($pdo));

// ---------- Tests methodes de recherche ---------- //
$productFindByCategory = $productRepo->findByCategory(3);
$productFindByStock = $productRepo->findInStock();
$productFindByPriceRange = $productRepo->findByPriceRange(20.00, 40.00);
$productFindBySearch = $productRepo->search("plaid");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <title>Repository Pattern</title>
</head>

<pre>
    <?= var_dump($productFindBySearch) ?>
</pre>

<body>
    <h1 class="h1 text-center mt-5">methodes de recherche</h2>

        <h2 class="h2 text-center mt-5">Find By Category</h2>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <?php foreach ($productFindByCategory as $product): ?>
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

        <hr class="hr">

        <h2 class="h2 text-center mt-5">Find By Stock</h2>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <?php foreach ($productFindByStock as $product): ?>
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

        <hr class="hr">

        <h2 class="h2 text-center mt-5">Find By Price Range</h2>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <?php foreach ($productFindByPriceRange as $product): ?>
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

        <hr class="hr">

        <h2 class="h2 text-center mt-5">Find By Search Terms</h2>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <?php foreach ($productFindBySearch as $product): ?>
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