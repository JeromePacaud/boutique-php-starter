<?php

// Calculs

function calculateIncludingTax(float $priceIncludingTax, float $vat = 20): float
{
    return $priceIncludingTax + ($priceIncludingTax * ($vat / 100));
}

function calcultateDiscount(float $price, float $percentage): float
{
    return $price - ($price * ($percentage / 100));
}

function calculateTotal(array $cart): float
{
    $total = 0;

    foreach ($cart as $price) {
        $total += $price;
    }

    return $total;
}

// Formatage

function formatPrice(float $amount): string
{
    return number_format($amount, 3);
}

function formatDate(string $date): string
{
    $timestamp = strtotime($date);
    return date("d F Y", $timestamp);
}

// Fonctions d'affichage
function displayStockStatus(int $stock): string
{
    $color = "";
    switch ($stock) {
        case 0:
            $color = "red";
            break;
        case $stock > 0 && $stock <= 5:
            $color = "orange";
            break;
        case $stock > 5:
            $color = "black";
            break;
        default:
            $color = "black";
    }

    return <<<HTML
        <span style="color: $color;">$stock</span>
HTML;
}

// Fonctions de validation
function validateEMail(string $email): bool
{
    return filter_var($email, FILTER_VALIDATE_EMAIL) ? true : false;
}

function validatePrice(mixed $price): bool
{
    return $price > 0 ? true : false;
}


function dumpAndDie(mixed ...$vars): void
{
    echo '<pre style="
        background: #1e1e1e;
        color: #4ec9b0;
        padding: 20px;
        border-radius: 6px;
        font-family: Consolas, monospace;
        font-size: 14px;
        line-height: 1.5;
    ">';

    foreach ($vars as $index => $var) {
        echo "Variable #" . ($index + 1) . PHP_EOL;
        echo str_repeat('-', 40) . PHP_EOL;

        $type = gettype($var);
        echo "Type: {$type}" . PHP_EOL;

        match ($type) {
            'string' => printStringInfo($var),
            'array'  => printArrayInfo($var),
            default  => printStringInfo($var),
        };

        echo PHP_EOL . PHP_EOL;
    }

    echo '</pre>';
    die();
}

function printStringInfo(string $value): void
{
    echo "Length: " . strlen($value) . PHP_EOL;
    echo "Value: " . $value . PHP_EOL;
}

function printArrayInfo(array $values): void
{
    $i = 0;
    echo "Count: " . count($values) . PHP_EOL;
    echo "Value:" . PHP_EOL;
    foreach ($values as $value) {
        $type = gettype($value);
        echo "(" . $i++ . ")" . " => " . "$type " . "-" . " $value\n";
    }
    // print_r($values);
}

$cart = [10, 10, 10];
$validate = validateEMail('jerome@mail.com');
?>

<pre>
<?php
var_dump($validate);
var_dump(validatePrice(0));
?>
</pre>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p><?= calculateTotal($cart) ?></p>
    <p><?= formatDate("09-01-2026") ?></p>
    <p><?= displayStockStatus(0) ?></p>
    <p><?= displayStockStatus(3) ?></p>
    <p><?= displayStockStatus(5) ?></p>
    <p><?= displayStockStatus(6) ?></p>

    <p><?= dumpAndDie($cart, $validate, 10, 20.29, ["hello", 15, 53.35]) ?></p>
</body>

</html>