<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$title = "Boutique";

$name = "Nike Air Max";
$description = "Une super pair de sneakers";
$priceHT = 179.99;
$stock = 30;
$discount = 10;
$isdiscount = true;

$vat = 20;
$tva = $priceHT * ($vat / 100);
$ttc = $priceHT + $tva;
$total = $ttc * $stock;
$reduction = $ttc + ($ttc * ($discount / 100));
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <section class="container" id="products">
        <h1 class="text-center mb-5"><?= $title ?></h2>

            <div class="row justify-content-center g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100">
                        <img src="https://images.unsplash.com/photo-1595950653106-6c9ebd614d3a?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="card-img-top" alt="Produit 1">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?= $name ?></h5>
                            <p class="card-text"><?= $description ?></p>
                            <div class="container-fluid d-flex flex-row justify-content-between px-0">
                                <p class="fw-bold text-primary">Prix HT: <?= number_format($priceHT, 2) ?>€</p>
                                <p class="fw-bold text-primary">TVA: <?= number_format($tva, 2) ?>€</p>
                                <?php if($isdiscount): ?>
                                    <p class="fw-bold text-primary">Prix remisée: <?= number_format($reduction, 2) ?>€</p>
                                <?php else: ?>
                                    <p class="fw-bold text-primary">Prix TTC: <?= number_format($ttc, 2) ?>€</p>
                                <?php endif ?>
                            </div>
                            <?php if ($stock > 0): ?>

                                <p class="fw-bold text-primary"><?= $stock ?> pair(s) en stock</p>

                            <?php else: ?>

                                <p class="fw-bold text-danger">Rupture de stock</p>

                            <?php endif ?>
                            <div class="mt-auto d-flex justify-content-between">
                                <button class="btn btn-primary w-50" style="width: 45%; gap: 10px;">
                                    Détails
                                </button>
                                <a href="#" class="btn btn-success" style="width: 45%; gap: 10px;">Ajouter au pannier</a>
                            </div>
                        </div>
                    </div>
                </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>