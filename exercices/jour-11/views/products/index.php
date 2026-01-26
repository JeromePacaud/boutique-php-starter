<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title><?= htmlspecialchars($title) ?></title>
</head>

<body class="bg-light">

    <div class="container mt-5">
        <a href="/" class="btn btn-primary"><- Accueil</a>
                <h2 class="mb-4 text-center"><?= htmlspecialchars($title) ?></h2>

                <div class="row">
                    <!-- Product -->
                    <?php foreach ($products as $product): ?>
                        <div class="col-md-3 mb-3">
                            <div class="card shadow-sm h-100">
                                <img src="https://placehold.co/100x100" class="card-img-top" alt="Produit">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $product->getName() ?></h5>
                                    <p class="text-muted"><?= $product->getCategory()->getName() ?></p>
                                    <p><?= $product->getDescription() ?></p>

                                    <ul class="list-group list-group-flush mb-2">
                                        <li class="list-group-item">
                                            Prix TTC : <?= number_format($product->getPriceIncludingTax(), 2) ?> €
                                        </li>
                                        <li class="list-group-item">
                                            Stock : <?= $product->getStock() ?>
                                        </li>
                                    </ul>
                                    <a href="/product/<?= $product->getID() ?>" class="btn btn-primary w-100">Detail Produits</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>

                </div>
    </div>

</body>

</html>