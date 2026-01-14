<?php

$products = [];

for ($i = 0; $i < 10; $i++) {
    $product = [
        "name" => "produit $i",
        "price" => rand(10, 150),
        "onSale" => false,
        "stock" => rand(0, 50),
        "image" => "https://placehold.co/352x200",
    ];
    $products[] = $product;
}

$products[3]["stock"] = 0;
$products[6]["stock"] = 0;
$products[8]["stock"] = 0;

$products[2]["onSale"] = true;
$products[4]["onSale"] = true;
$products[10]["onSale"] = true;

function createProductCard(array $data): string
{
    $image = $data["image"];
    $price = $data["price"];
    $name = $data["name"];
    $on_sale = $data["onSale"];
    $stock = $data["stock"];
    $discount_price = $price - ($price * 0.2);
    $stock_class = getClassColor($stock);
    $is_discount = isDiscount($on_sale);
    $price_text = formatDiscountPrice($price, $discount_price, $is_discount);

    return <<<HTML
        <div class="produit">

            <img src="$image" alt="">
            <h5>$name</h5>
            <p class="$stock_class"> $stock </p>

            <p class="$stock_class">$is_discount</p>
            <p>$price_text €</p>
        </div>
HTML;
}

function getClassColor(int $stock): string
{
    return $stock > 0 ? "en-stock" : "rupture";
}

function isDiscount(bool $on_sale): string
{
    return $on_sale ? "🔥 PROMO" : "";
}

function formatDiscountPrice(int $price, int $new_price, bool $on_sale): string
{
    return $on_sale ? "<strike>$price</strike> -> $new_price" : $price;
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
            <?= createProductCard($product); ?>
        <?php endforeach ?>

    </div>
</body>

</html>