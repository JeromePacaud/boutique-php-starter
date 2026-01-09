<?php

function formatPrice(float $amout, string $currency = "€", int $decimals = 2): string
{
    return number_format($amout, $decimals) . $currency;
}

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

<body>

    <p> <?= $num1 ?> </p>
    <p> <?= $num2 ?> </p>
    <p> <?= $num3 ?> </p>

</body>

</html>