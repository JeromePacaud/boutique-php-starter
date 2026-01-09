<?php

function calculateVAT(float $priceExcludingTax, float $rate): float
{
    if ($rate > 1) {
        return $priceExcludingTax * ($rate / 100);
    }

    return $priceExcludingTax * $rate;
}

function calculateIncludingTax(float $priceExcludingTax, float $rate): float
{
    return $priceExcludingTax + calculateVAT($priceExcludingTax, $rate);
}

function calcultateDiscount(float $price, $percentage): float
{
    if ($percentage > 1) {
        return $price - ($price * ($percentage / 100));
    }

    return $price - ($price * $percentage);
}

$vat = calculateVAT(100, 20);
$ttc = calculateIncludingTax(100, $vat);
$discount = calcultateDiscount(100, 20);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<p>Montant de la TVA: <?= $vat ?></p>
<p>Prix TTC: <?= $ttc ?></p>
<p>Prix après réduction: <?= $discount ?></p>

<body>
</body>

</html>