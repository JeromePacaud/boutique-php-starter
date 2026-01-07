<?php

$products = [
    [
        "name" => "souris",
        "price" => 59.99,
        "stock" => 50,
    ],
    [
        "name" => "clavier",
        "price" => 89.99,
        "stock" => 0,
    ],
    [
        "name" => "écran",
        "price" => 129.99,
        "stock" => 60,
    ],
    [
        "name" => "tour",
        "price" => 999.99,
        "stock" => 5,
    ],
    [
        "name" => "set-up complet",
        "price" => 1259.99,
        "stock" => 3,
    ],
    [
        "name" => "ram",
        "price" => 19.99,
        "stock" => 0,
    ],
    [
        "name" => "CPU",
        "price" => 119.99,
        "stock" => 30,
    ],
    [
        "name" => "GPU",
        "price" => 829.99,
        "stock" => 7,
    ],
    [
        "name" => "carte mère",
        "price" => 199.99,
        "stock" => 50,
    ],
    [
        "name" => "ventilateur",
        "price" => 59.99,
        "stock" => 3,
    ],
];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php foreach ($products as $product): ?>

        <?php if ($product["stock"] === 0): continue; ?>

        <?php elseif ($product["price"] > 100): break; ?>

        <?php elseif ($product["price"] <= 100 && $product["stock"] > 0): ?>

            <article>
                <h3><?= $product["name"] ?></h3>
                <p class="prix"><?= $product["price"] ?></p>
                <p class="stock"><?= $product["stock"] ?></p>
            </article>

        <?php endif; ?>

    <?php endforeach; ?>
    
    <p>------------------------</p>

    <?php foreach ($products as $product): ?>

        <?php if ($product["price"] <= 100 && $product["stock"] > 0): ?>

            <article>
                <h3><?= $product["name"] ?></h3>
                <p class="prix"><?= $product["price"] ?></p>
                <p class="stock"><?= $product["stock"] ?></p>
            </article>

        <?php endif; ?>

    <?php endforeach; ?>
</body>

</html>