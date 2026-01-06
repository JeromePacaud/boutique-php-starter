<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$product = [
    [
        "name" => "clavier",
        "price" => 99.99,
        "stock" => 30,
    ],
    [
        "name" => "souris",
        "price" => 59.99,
        "stock" => 20,
    ],
    [
        "name" => "écran",
        "price" => 129.99,
        "stock" => 50,
    ],
    [
        "name" => "tapis de souris",
        "price" => 29.99,
        "stock" => 10,
    ],
    [
        "name" => "tour",
        "price" => 1199.99,
        "stock" => 5,
    ],
];

?>

<pre>
<?php

echo
"Nom du 3ème produit:\n" . "\n\t" . "- " . $product[2]["name"] . "\n\n" .
    "Prix du 1er produit:\n" . "\n\t" . "- " . $product[0]["price"] . "\n\n" .
    "Stock du dernier produit:\n" . "\n\t" . "- " . $product[count($product) - 1]["price"] . "€" . "\n\n";

echo "Stock du 2èmre produit avant modification:\n" . "\n\t" . "- " . $product[1]["stock"] . "\n\n";
$product[1]["stock"] += 10;
echo "Stock du 2èmre produit après modification:\n" . "\n\t" . "- " . $product[1]["stock"] . "\n\n";
?>
</pre>