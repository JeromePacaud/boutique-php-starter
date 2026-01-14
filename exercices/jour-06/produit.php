<?php
$products = [
    1 => ["name" => "T-shirt", "price" => 29.99],
    2 => ["name" => "Jean", "price" => 79.99],
    3 => ["name" => "Veste", "price" => 119.99],
    4 => ["name" => "Chaussures", "price" => 99.99],
    5 => ["name" => "Casquette", "price" => 19.99],
];

$id = $_GET['id'] ?? '';
$product = is_numeric($id) && isset($products[(int)$id]) ? $products[(int)$id] : null;
?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Produit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<div class="row">
    <div class="col-md-4">
        <pre>
            <?= var_dump($_SERVER) ?>
        </pre>
    </div>
    <div class="col-md-4">
        <pre>
            <?= var_dump($_REQUEST) ?>
        </pre>
    </div>
    <div class="col-md-4">
        <pre>
            <?= var_dump($_GET) ?>
        </pre>
    </div>
</div>

<body class="bg-light">
    <div class="container mt-5">
        <div class="card p-4">
            <h1 class="mb-4">Exercice 2 — Produit</h1>

            <form method="get" class="mb-3">
                <label class="form-label">ID du produit (1 à 5)</label>
                <input class="form-control" name="id" value="<?= htmlspecialchars($id) ?>">
                <button class="btn btn-primary mt-2">Afficher</button>
            </form>

            <?php if ($id !== ''): ?>
                <?php if ($product): ?>
                    <div class="alert alert-success">
                        <strong><?= htmlspecialchars($product['name']) ?></strong><br>
                        Prix : <?= number_format($product['price'], 2) ?> €
                    </div>
                <?php else: ?>
                    <div class="alert alert-danger">Produit non trouvé</div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>