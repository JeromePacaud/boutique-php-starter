<?php

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

</body>

</html>