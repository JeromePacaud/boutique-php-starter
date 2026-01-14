<?php

$products = [];

for ($i = 0; $i < 10; $i++) {
    $product = [
        "date" => date("Y-F-j"),
        "stock" => rand(0, 50),
        "active" => true,
        "image" => "https://placehold.co/352x200",
    ];
    $products[] = $product;
}

$products[3]["stock"] = 0;
$products[6]["stock"] = 0;
$products[8]["stock"] = 0;

function createProductCard(array $data): string
{
    $image = $data["image"];
    $stock = $data["stock"];
    $is_active = $data["active"];
    $date = $data["date"];
    $promoEndDate = strtotime("10 décembre 2025");

    $stock_class = getClassColor($stock);
    $stock_text = $stock > 0 ? "en stock" : "Rupture de stock";

    $is_available = isAvailable($stock, $is_active);
    $is_discount = isDiscount($date, $promoEndDate, $stock);

    return <<<HTML
        <div class="produit">

            <img src="$image" alt="">
            <p class="$stock_class"> $stock </p>

            $stock_text <br>
            $is_available <br>
            $is_discount 
        </div>
HTML;
}

function getClassColor(int $stock): string
{
    return $stock > 0 ? "en-stock" : "rupture";
}

function isDiscount(string $date, string $promoEndDate, int $stock): string
{
    if (!$stock) {
        return "";
    };
    return $date < $promoEndDate ? "En promotion" : "Plein tarif";
}

function isAvailable(int $stock, bool $is_active): string
{
    return ($stock > 0 && $is_active === true) ? "Disponible" : "Indisponnible";
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