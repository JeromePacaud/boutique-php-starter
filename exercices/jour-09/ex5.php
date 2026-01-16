<?php

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "jour-09" . DIRECTORY_SEPARATOR . "Class" . DIRECTORY_SEPARATOR . "Category.php";
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "jour-09" . DIRECTORY_SEPARATOR . "Class" . DIRECTORY_SEPARATOR . "Product.php";
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "jour-09" . DIRECTORY_SEPARATOR . "Class" . DIRECTORY_SEPARATOR . "Order.php";


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

// Instance Address
$address = new Address("394 rue des oiseaux", "Moirans", "38590", "France");

// Instances User
$user = new User("Thomas Bernard", "thomas.bernard@email.com");
$user->addAddress($address);

// Instances Cart
$cart = new Cart();

// Creation du panier
foreach ($products as $product) {
    $cart->addProduct($product, 1);
}
$cart->updateProduct($products[3]->getID(), 2);

// Instance Order
$order = new Order(1, $user, $cart);
$order->setStatus("Envoyé");
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>jour-09</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<pre class="container row">
    <div class="col-md-4">
        <?= var_dump($user) ?>
    </div>
    <div class="col-md-4">
        <?= var_dump($address) ?>
    </div>
    <div class="col-md-4">
        <?= var_dump($cart) ?>
    </div>
</pre>

<body class="bg-light">

    <div class="container mt-5">
        <h2 class="mb-4 text-center">Order</h2>

        <div class="row justify-content-center">
            <!-- Order -->
            <div class="col-md-4 mb-3 ">
                <div class="card shadow-sm ">
                    <div class="card-body">
                        <h5 class="card-title">Nom : <strong><?= $order->getUser()->getName() ?></strong></h5>
                        <ul class="list-group list-group-flush mb-2">
                            <li class="list-group-item">
                                Email : <strong><?= $order->getUser()->getEmail() ?></strong></p>
                            </li>
                            <li class="list-group-item">
                                Adresse de Livraison : <strong><?= $user->getDefaultAddress()->getAdress() ?></strong>
                            </li>
                            <li class="list-group-item">
                                Total articles : <strong><?= $order->getItemCount() ?></strong>
                            </li>
                            <li class="list-group-item">
                                Commandes passer en date du : <strong><?= $order->getOrderDate() ?></strong>
                            </li>
                            <li class="list-group-item">
                                Status : <strong><?= $order->getStatus() ?></strong>
                            </li>
                            <li class="list-group-item">
                                Prix total : <strong><?= $order->getTotal() ?> €</strong>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Recap pannier -->
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title text-center">Récapitulatif</strong></h5>
                        <ul class="list-group list-group-flush mb-2">
                            <?php foreach ($order->getItems() as $item): ?>
                                <li class="list-group-item">
                                    Nom du produit : <strong><?= $item->getProduct()->getName() ?></strong><br>
                                    Quantité dans le pannier : <strong><?= $item->getQuantity() ?></strong><br>
                                    prix unitaire : <strong><?= $item->getProduct()->getPrice() ?> €</strong><br>
                                    prix TTC : <strong><?= $item->getProduct()->getPriceIncludingTax() ?> €</strong><br>
                                    prix total par article : <strong><?= $item->getTotal() ?> €</strong><br>
                                </li>
                                <li class="list-group-item">

                                </li>
                            <?php endforeach ?>
                            <li class="list-group-item">
                                Prix total : <strong><?= $order->getTotal() ?> €</strong>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

</body>

</html>