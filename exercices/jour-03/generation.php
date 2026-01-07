<?php

$products = [];

for ($i = 1; $i <= 10; $i++) {
    $product = [
        "name" => "Produit" . "$i",
        "price" => rand(10, 100),
        "stock" => rand(0, 50),

    ];

    $products[] = $product;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <pre>
        <?= var_dump($products) ?>
    </pre>

</body>

</html>