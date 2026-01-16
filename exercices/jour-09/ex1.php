<?php

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "jour-09" . DIRECTORY_SEPARATOR . "Class" . DIRECTORY_SEPARATOR . "Category.php";
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "jour-09" . DIRECTORY_SEPARATOR . "Class" . DIRECTORY_SEPARATOR . "Product.php";

// Instances Category
$categories = [
    new Category(1, "Informatique Gaming", "Produits dédiés au gaming"),
    new Category(2, "Fitness & Santé", "Équipements et accessoires sportifs"),
    new Category(3, "Maison Connectée", "Objets intelligents pour la maison"),
];

// Instances Product
$products = [
    new Product(1, "Clavier mécanique", "Clavier RGB switches mécaniques", 120.00, 5, $categories[0]),
    new Product(2, "Souris gaming", "Souris haute précision", 60.00, 8, $categories[0]),
    new Product(3, "Banc de musculation", "Banc pliable multifonction", 220.00, 3, $categories[1]),
    new Product(4, "Montre connectée", "Suivi sportif et santé", 150.00, 6, $categories[1]),
    new Product(5, "Casque Bluetooth", "Réduction de bruit active", 180.00, 4, $categories[2]),
];

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>jour-08</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<div class="row">
    <pre class="col-md-4">
        <?= var_dump($categories) ?>
    </pre>
    <pre class="col-md-4">
        <?= var_dump($products) ?>
    </pre>
</div>

<body class="bg-light">

    <div class="container mt-5">
        <h2 class="mb-4 text-center">Classes Liée</h2>

        <div class="row">
            <!-- Product -->
            <?php foreach ($products as $product): ?>
                <div class="col-md-4 mb-3">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="card-title"><?= $product->getName() ?></h5>
                            <p class="text-muted"><?= $product->getCategory()->getName() ?></p>
                            <p><?= $product->getDescription() ?></p>

                            <ul class="list-group list-group-flush mb-2">
                                <li class="list-group-item">
                                    Prix TTC : <?= number_format($product->getPriceIncludingTax(), 2) ?> €
                                </li>
                                <li class="list-group-item">
                                    Stock : <?= $product->getStock() ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>

        </div>

</body>

</html>