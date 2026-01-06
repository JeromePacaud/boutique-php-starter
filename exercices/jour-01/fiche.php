<?php
$title = "Boutique";
$name = "Nike Air Max";
$price = 179.99;
$stock = 20;
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
</head>

<body>
    <!-- À toi de jouer -->
    <h1><?= $name ?></h1>
    <p><?= $price ?></p>
    <?php if ($stock > 0): ?>

        <?= $stock . " " . " pairs " ?><span>en stock</span>

    <?php else: ?>

        <span>Rupture de stock !</span>

    <?php endif ?>
</body>

</html>