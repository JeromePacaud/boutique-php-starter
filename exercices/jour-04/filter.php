<?php

$products = [
    [
        "name" => "souris",
        "price" => 19.99,
        "stock" => 50,
        "image" => "https://placehold.co/332x200",
        "category" => "accessoire"
    ],
    [
        "name" => "clavier",
        "price" => 49.99,
        "stock" => 0,
        "image" => "https://placehold.co/332x200",
        "category" => "accessoire"
    ],
    [
        "name" => "écran",
        "price" => 129.99,
        "stock" => 60,
        "image" => "https://placehold.co/332x200",
        "category" => "accessoire"
    ],
    [
        "name" => "tour",
        "price" => 999.99,
        "stock" => 5,
        "image" => "https://placehold.co/332x200",
        "category" => "bundle"
    ],
    [
        "name" => "set-up complet",
        "price" => 1259.99,
        "stock" => 3,
        "image" => "https://placehold.co/332x200",
        "category" => "bundle"

    ],
    [
        "name" => "ram",
        "price" => 19.99,
        "stock" => 0,
        "image" => "https://placehold.co/332x200",
        "category" => "composant"
    ],
    [
        "name" => "CPU",
        "price" => 119.99,
        "stock" => 30,
        "image" => "https://placehold.co/332x200",
        "category" => "composant"
    ],
    [
        "name" => "GPU",
        "price" => 829.99,
        "stock" => 7,
        "image" => "https://placehold.co/332x200",
        "category" => "composant"
    ],
    [
        "name" => "carte mère",
        "price" => 199.99,
        "stock" => 50,
        "image" => "https://placehold.co/332x200",
        "category" => "composant"
    ],
    [
        "name" => "ventilateur",
        "price" => 9.99,
        "stock" => 3,
        "image" => "https://placehold.co/332x200",
        "category" => "composant"
    ],
];

$products_count = 0;

function createProductCard(array $data): string
{
    $image = $data["image"];
    $name = $data["name"];
    $price = $data["price"];
    $stock = $data["stock"];
    $category = $data["category"];

    return <<<HTML
        <div class="produit">
            <img src="$image" alt="">
            <p>$category</p>
            <h4>$name</h4>
            <strong>$price €</strong>
            <p>$stock</p>
        </div>
HTML;
}

?>

<pre>
    <?php var_dump($products) ?><br>
</pre>

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
    <div class="grille">
        
        <?php foreach ($products as $product): ?>
            <?php if ($product["stock"] > 0 && $product["price"] < 50): ?>
                <?php $count++ ?>
                <?= createProductCard($product); ?>
            <?php endif ?>
        <?php endforeach ?>
        <?= $count . " produit trouvés sur " . count($products) ?>
    </div>
</body>

</html>