<?php
$products = array_map(fn($i) => ["name" => "Produit $i"], range(1, 10));
$search = trim($_GET['search'] ?? '');

$results = array_filter(
    $products,
    fn($p) =>
    $search === '' || stripos($p['name'], $search) !== false
);
?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Recherche</title>
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
            <h1>Exercice 5 — Recherche</h1>

            <form method="get" class="mb-3">
                <input class="form-control" name="search" placeholder="Rechercher" value="<?= htmlspecialchars($search) ?>">
            </form>

            <?php if ($search): ?>
                <?php if ($results): ?>
                    <ul class="list-group">
                        <?php foreach ($results as $p): ?>
                            <li class="list-group-item"><?= htmlspecialchars($p['name']) ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <div class="alert alert-warning">Aucun résultat</div>
                <?php endif; ?>
            <?php endif; ?>

        </div>
    </div>
</body>

</html>