<?php

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "jour-10" . DIRECTORY_SEPARATOR . "BDD" . DIRECTORY_SEPARATOR . "config.php";
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "jour-10" . DIRECTORY_SEPARATOR  . "Repository" . DIRECTORY_SEPARATOR . "ProductRepository2.php";
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "jour-10" . DIRECTORY_SEPARATOR  . "Repository" . DIRECTORY_SEPARATOR . "CategoryRepository.php";

$categoryRepo = new CategoryRepository($pdo);
$productRepo = new ProductRepository($pdo, $categoryRepo);

// ---------- Tests CRUD ---------- //
$category = $categoryRepo->find(3);
$categories = $categoryRepo->findAll();
$newCategory = $categoryRepo->save(new Category(9, 'Linge de lit', 'Linge de lit'));
$categoryRepo->delete(9);

// ---------- Tests methodes de recherche ---------- //
$categoryFindBySearch = $categoryRepo->search('m');
$categoriesWithProducts = $categoryRepo->findWithProducts($productRepo);
$categoryWithProductById = $categoryRepo->findWithProductsById(2, $productRepo);
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
    <?= var_dump($categoriesWithProducts) ?>
</pre>

<body>
    <h1 class="h1 text-center mt-5">CRUD</h2>

        <h2 class="h2 text-center mt-5">READ</h2>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <div class="card">
                        <img src="https://placehold.co/100x100" class="card-img-top" alt="Category">
                        <div class="card-body">
                            <h5 class="card-title"><?= $category->getName()  . " - " .  $category->getID() ?></h5>
                            <p class="card-text"><?= $category->getDescription() ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr class="hr">

        <h2 class="text-center mt-5">READ ALL</h2>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <?php foreach ($categories as $category): ?>
                    <div class="col-md-3">
                        <div class="card">
                            <img src="https://placehold.co/100x100" class="card-img-top" alt="Category">
                            <div class="card-body">
                                <h5 class="card-title"><?= $category->getName()  . " - " .  $category->getID() ?></h5>
                                <p class="card-text"><?= $category->getDescription() ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>

        <hr class="hr">

        <h2 class="text-center mt-5">CREATE</h2>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <div class="card">
                        <img src="https://placehold.co/100x100" class="card-img-top" alt="Category">
                        <div class="card-body">
                            <h5 class="card-title"><?= $category->getName()  . " - " .  $category->getID() ?>/h5>
                                <p class="card-text"><?= $category->getDescription() ?></p>
                                <p class="card-text"><?= $category->getDescription() ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr class="hr">

        <h2 class="text-center mt-5">READ ALL</h2>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <?php foreach ($categoryFindBySearch as $category): ?>
                    <div class="col-md-3">
                        <div class="card">
                            <img src="https://placehold.co/100x100" class="card-img-top" alt="Category">
                            <div class="card-body">
                                <h5 class="card-title"><?= $category->getName()  . " - " .  $category->getID() ?></h5>
                                <p class="card-text"><?= $category->getDescription() ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>

        <hr class="hr">

        <h2 class="text-center mt-5">FIND WITH PRODUCTS</h2>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <?php foreach ($categoriesWithProducts as $category): ?>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Categorie : <?= $category->getName() ?></h5>
                            </div>
                            <?php foreach ($category->getProducts() as $product): ?>
                                <ul class="list-group list-group-flush mb-2">
                                    <li class="list-group-item">
                                        Produits : <?= $product->getName() ?>
                                    </li>
                                </ul>
                            <?php endforeach ?>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>

        <hr class="hr">

        <h2 class="text-center mt-5">FIND WITH PRODUCTS BY ID</h2>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Categorie : <?= $category->getName() ?></h5>
                        </div>
                        <?php foreach ($category->getProducts() as $product): ?>
                            <ul class="list-group list-group-flush mb-2">
                                <li class="list-group-item">
                                    Produits : <?= $product->getName() ?>
                                </li>
                            </ul>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>

        <hr class="hr">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>