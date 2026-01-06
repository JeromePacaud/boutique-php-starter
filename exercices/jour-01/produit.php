<?php
$name = "Clavier";
$price = 129.99;
$stock = 50;
$onSale = true;
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
    $name,
    $price,
    $stock,
    $onSale
);
echo "Le produit $name coûte $price €";
?>
    </pre>
</body>

</html>