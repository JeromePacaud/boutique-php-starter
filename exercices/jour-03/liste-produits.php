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
        "stock" => 30,
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
        <article>
            <h3><?= $product["name"] ?></h3>
            <p class="prix"><?= $product["price"] ?></p>
            <p class="stock"><?= $product["stock"] ?></p>
        </article>
    <?php endforeach; ?>
</body>

</html>