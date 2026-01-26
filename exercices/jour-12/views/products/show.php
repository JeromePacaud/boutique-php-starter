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
        <h2 class="mb-4 text-center"><?= htmlspecialchars($title) ?></h2>

        <div class="row justify-content-center">

            <div class="col-md-3 mb-3">
                <div class="card shadow-sm h-100">
                    <img src="https://placehold.co/100x100" class="card-img-top" alt="Produit">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($product->getName()) . " - #" . $product->getID() ?></h5>
                        <p class="text-muted"><?= htmlspecialchars($product->getCategory()->getName()) ?></p>
                        <p><?= htmlspecialchars($product->getDescription()) ?></p>

                        <ul class="list-group list-group-flush mb-2">
                            <li class="list-group-item">
                                Prix TTC : <?= number_format($product->getPriceIncludingTax(), 2) ?> €
                            </li>
                            <li class="list-group-item">
                                Stock : <?= $product->getStock() ?>
                            </li>
                        </ul>
                        <a href="/products" class="btn btn-primary w-100">Retour Catalogue</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>

</html>