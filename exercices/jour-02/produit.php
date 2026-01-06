<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$date = date("j F Y");

$product = [
    "name" => "Air Max",
    "description" => "Une super pair de Sneakers",
    "price" => 139.99,
    "stock" => 50,
    "category" => "Sneakers",
    "brand" => "Nike"
];

$product["dateAdded"] = $date;

$discount = $product["price"] - $product["price"] * 0.1;
$product["price"] = round($discount, 2);
?>

<pre>
<?php
echo "Fiche produit: \n\n";
foreach ($product as $key => $value) {
    echo "$key => $value\n";
}
echo "\n";
echo $product[6];
var_dump($product);
?>
</pre>