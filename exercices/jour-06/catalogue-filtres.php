<?php
$categories = ['Homme', 'Femme', 'Enfant'];
$products = [];

for ($i = 1; $i <= 15; $i++) {
    $products[] = [
        'name' => "Produit $i",
        'price' => rand(10, 150),
        'category' => $categories[array_rand($categories)],
        'inStock' => rand(0, 1)
    ];
}

$search = $_GET['search'] ?? '';
$category = $_GET['category'] ?? '';
$price = $_GET['price'] ?? '';
$stock = isset($_GET['stock']);

$filtered = array_filter($products, function ($p) use ($search, $category, $price, $stock) {
    if ($search && stripos($p['name'], $search) === false) return false;
    if ($category && $p['category'] !== $category) return false;
    if ($price && $p['price'] > $price) return false;
    if ($stock && !$p['inStock']) return false;
    return true;
});
?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Catalogue</title>
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
            <h1>Exercice 6 — Catalogue filtré</h1>

            <form method="get" class="row g-2 mb-3">
                <input class="form-control col" name="search" placeholder="Nom" value="<?= htmlspecialchars($search) ?>">
                <select name="category" class="form-select col">
                    <option value="">Toutes catégories</option>
                    <?php foreach ($categories as $c): ?>
                        <option <?= $c === $category ? 'selected' : '' ?>><?= $c ?></option>
                    <?php endforeach; ?>
                </select>
                <input type="number" class="form-control col" name="price" placeholder="Prix max" value="<?= htmlspecialchars($price) ?>">
                <div class="form-check col">
                    <input class="form-check-input" type="checkbox" name="stock" <?= $stock ? 'checked' : '' ?>>
                    <label class="form-check-label">En stock</label>
                </div>
                <button class="btn btn-primary col">Filtrer</button>
            </form>

            <?php if ($filtered): ?>
                <ul class="list-group">
                    <?php foreach ($filtered as $p): ?>
                        <li class="list-group-item">
                            <?= htmlspecialchars($p['name']) ?> — <?= $p['price'] ?> € (<?= $p['category'] ?>)
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <div class="alert alert-warning">Aucun produit trouvé</div>
            <?php endif; ?>

        </div>
    </div>
</body>

</html>