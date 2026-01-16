<?php

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "jour-09" . DIRECTORY_SEPARATOR . "Class" . DIRECTORY_SEPARATOR . "Category.php";
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "jour-09" . DIRECTORY_SEPARATOR . "Class" . DIRECTORY_SEPARATOR . "Product.php";
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "jour-09" . DIRECTORY_SEPARATOR . "Class" . DIRECTORY_SEPARATOR . "CartItem.php";
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "jour-09" . DIRECTORY_SEPARATOR . "Class" . DIRECTORY_SEPARATOR . "CartFluent.php";

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

// Créer un panier
$cart = new CartFluent();

// Ajouter des produits
$cart->addProduct($products[0], 2)
    ->updateProduct($products[0]->getID(), 3)
    ->addProduct($products[2], 1)
    ->addProduct($products[1], 2)
    ->addProduct($products[4], 3)
    ->removeProduct($products[1]->getID());
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>jour-08</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<pre class="container row">
    <div class="col-md-4">
        <?= var_dump($categories) ?>
    </div>
    <div class="col-md-4">
    <?= var_dump($products) ?>
    </div>
    <div class="col-md-4">
    <?= var_dump($cart) ?>
    </div>
</pre>

<body class="bg-light">

    <div class="container mt-5">
        <h2 class="mb-4 text-center">Cart Item</h2>

        <div class="row">
            <!-- Product -->
            <h3 class="text-center">Prix total : <?= $cart->getTotal() ?> €</h3>
            <?php foreach ($cart->getItems() as $item): ?>
                <div class="col-md-4 mb-3">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="card-title">Nom de produit: <?= $item->getProduct()->getName() ?></h5>
                            <p class="text-muted">Quantité dans le pannier: <?= $item->getQuantity() ?></p>
                            <p>Categorie: <strong><?= $item->getProduct()->getCategory()->getName() ?></strong></p>
                            <p>Prix unitaire: <?= $item->getProduct()->getPriceIncludingTax() ?> €</p>
                            <p>Prix total par produits: <?= $item->getTotal() ?> €</p>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>

        </div>

</body>

</html>