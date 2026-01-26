<?php

function greet(): string
{
    return "Bienvenu sur la boutique";
}

function greetClient(string $name): string
{
    return "Bonjour $name";
}

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

function formatPrice(float $amout, string $currency = "€", int $decimals = 3): string
{
    return number_format($amout, $decimals) . $currency;
}


function isInStock(int $stock): bool
{
    return $stock > 0 ? true : false;
}

function isOnSale(float $discount): bool
{
    return  $discount > 0 ? true : false;
}

function isNew(string $dateAdded): bool
{
    $daySince = (time() - strtotime($dateAdded)) / 86400;
    return $daySince < 30 ? true : false;
}

function canOrder(int $stock, int $quantity): bool
{
    return $stock >= $quantity ? true : false;
}


function displayBadge(string $text, string $color): string
{
    return "<span class=\"badge\" style=\"background: $color\">$text</span>";
}

function displayPrice(float $price, float $discount = 0): string
{
    if ($discount > 0) {
        $discounPrice = $price - ($price * ($discount / 100));
        return "<strike>$price € </strike><br><span>$discounPrice €</span>";
    }

    return "<span>$price</span>";
}

function displayStock(int $quantity): string
{
    $color = ['red', 'orange', 'black'];

    if ($quantity === 0) {
        return "<span style=\"color: $color[0];\">$quantity</span>";
    } elseif ($quantity > 0 && $quantity < 5) {
        return "<span style=\"color: $color[1];\">$quantity</span>";
    }

    return "<span style=\"color: $color[2];\">$quantity</span>";
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
</body>

</html>