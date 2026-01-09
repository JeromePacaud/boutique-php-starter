<?php

require_once "helpers.php";

$vat = calculateVAT(100, 20);
$ttc = calculateIncludingTax(100, $vat);
$discount = calcultateDiscount(100, 20);

$num1 = formatPrice(99.999);
$num2 = formatPrice(99.999, "$");
$num3 = formatPrice(99.999, decimals: 0);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<pre>
<?=
var_dump(
    isInStock(0),
    isInStock(20),
    isOnSale(0),
    isOnSale(20),
    isNew("2025-12-01"),
    isNew("2025-12-31"),
    canOrder(10, 20),
    canOrder(15, 2)
);
?>
</pre>

<body>
    <h2><?= greet() ?></h2>
    <h2><?= greetClient("Jérôme") ?></h2>
    <h2><?= greetClient("Anne-Laure") ?></h2>
    <h2><?= greetClient("Elyes") ?></h2>

    <p>Montant de la TVA: <?= $vat ?></p>
    <p>Prix TTC: <?= $ttc ?></p>
    <p>Prix après réduction: <?= $discount ?></p>

    <p> <?= $num1 ?> </p>
    <p> <?= $num2 ?> </p>
    <p> <?= $num3 ?> </p>

    <div><?= displayBadge("12.99 $", "green"); ?></div>
    <div><?= displayPrice(12, 20) ?></div>
    <div><?= displayStock(0) ?></div>
    <div><?= displayStock(4) ?></div>
    <div><?= displayStock(12) ?></div>

</body>

</html>