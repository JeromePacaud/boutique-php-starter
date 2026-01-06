<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$title = "Produit complet";

$product = [
    "name" => "tshirt blanc",
    "images" => ["./images/face.png", "./images/dos.png", "./images/porter.png"],
    "sizes" => ["S", "M", "L", "XL"],
    "review" => [
        [
            "author" => "John Doe",
            "rating" => 5,
            "comment" => "Super tshirt"
        ],
        [
            "author" => "Jane Doe",
            "rating" => 3,
            "comment" => "Mauvaise qualité"
        ],
    ]
];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
</head>

<body>
    <div style="display: flex; flex-direction: column; align-items: center;">
        <img src="<?= $product["images"][1] ?>" style="width: 400px; display: block;" alt="">
        <select name="size" id="size-select" style="width: 448px; height: 44px; text-align: center; font-size: 18px">

            <option value="">--Choisir parmis les <?= count($product["sizes"]) ?> taille disponibles--</option>

            <?php for ($i = 0; $i < count($product["sizes"]); $i++): ?>
                <option value="<?= $product["sizes"][$i] ?>"><?= $product["sizes"][$i] ?></option>
            <?php endfor ?>

        </select>
        <p>
            author: <?= $product["review"][1]["author"] ?> <br>
            note: <?= $product["review"][1]["rating"] ?> <br>
            commentaire: <?= $product["review"][1]["comment"] ?> <br>
        </p>
    </div>
</body>

</html>