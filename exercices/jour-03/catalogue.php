<?php

$products = [
    [
        "name" => "souris",
        "price" => 59.99,
        "stock" => 50,
        "image" => "https://placehold.co/332x200",
    ],
    [
        "name" => "clavier",
        "price" => 89.99,
        "stock" => 0,
        "image" => "https://placehold.co/332x200",
    ],
    [
        "name" => "écran",
        "price" => 129.99,
        "stock" => 60,
        "image" => "https://placehold.co/332x200",
    ],
    [
        "name" => "tour",
        "price" => 999.99,
        "stock" => 5,
        "image" => "https://placehold.co/332x200",
    ],
    [
        "name" => "set-up complet",
        "price" => 1259.99,
        "stock" => 3,
        "image" => "https://placehold.co/332x200",
    ],
    [
        "name" => "ram",
        "price" => 19.99,
        "stock" => 0,
        "image" => "https://placehold.co/332x200",
    ],
    [
        "name" => "CPU",
        "price" => 119.99,
        "stock" => 30,
        "image" => "https://placehold.co/332x200",
    ],
    [
        "name" => "GPU",
        "price" => 829.99,
        "stock" => 7,
        "image" => "https://placehold.co/332x200",
    ],
    [
        "name" => "carte mère",
        "price" => 199.99,
        "stock" => 50,
        "image" => "https://placehold.co/332x200",
    ],
    [
        "name" => "ventilateur",
        "price" => 59.99,
        "stock" => 3,
        "image" => "https://placehold.co/332x200",
    ],
];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .grille {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .produit {
            border: 1px solid #ddd;
            padding: 15px;
        }

        .rupture {
            color: red;
        }

        .en-stock {
            color: green;
        }
    </style>
</head>

<body>

    <h1>Nos produits</h1>
    <p><?= count($products) ?> produits affichés</p>

    <div class="grille">

        <?php foreach ($products as $product): ?>
            <div class="produit">

                <img src="<?= $product["image"] ?>" alt="">
                <h3><?= $product["name"] ?></h3>
                <p class="prix"><?= $product["price"] ?></p>
                <?php if ($product["stock"] > 0): ?>
                    <p class="en-stock"><?= $product["stock"] ?></p>
                <?php else: ?>
                    <p class="rupture"><?= $product["stock"] ?></p>
                <?php endif; ?>

            </div>
        <?php endforeach ?>

    </div>

</body>

</html>