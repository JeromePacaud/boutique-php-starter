<?php
$priceExcludingTax = 100;
$vat = 20;
$quantity = 3;

$tva = $priceExcludingTax * ($vat / 100);
$ttc = $priceExcludingTax + $tva;
$total = $ttc * $quantity;
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
<?php
var_dump(
    $priceExcludingTax,
    $vat,
    $quantity,
    $tva,
    $ttc,
    $total
);
?>
    </pre>
</body>

</html>