<?php

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


    <div><?= displayBadge("12.99 $", "green"); ?></div>
    <div><?= displayPrice(12, 20) ?></div>
    <div><?= displayStock(0) ?></div>
    <div><?= displayStock(4) ?></div>
    <div><?= displayStock(12) ?></div>
</body>

</html>