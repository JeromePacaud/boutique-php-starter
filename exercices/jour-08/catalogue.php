<?php
class Product
{
    private int $id;
    private string $nom;
    private string $description;
    private float $prix;
    private int $stock;
    private string $categorie;

    public function __construct(
        int $id,
        string $nom,
        string $description,
        float $prix,
        int $stock,
        string $categorie
    ) {
        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
        $this->prix = $prix;
        $this->stock = $stock;
        $this->categorie = $categorie;
    }

    public function getPriceIncludingTax(float $vat = 20): float
    {
        return $this->prix * (1 + $vat / 100);
    }

    public function isInStock(): bool
    {
        return $this->stock > 0;
    }

    public function reduceStock(int $quantity): void
    {
        if ($quantity <= $this->stock) {
            $this->stock -= $quantity;
        }
    }

    public function applyDiscount(float $percentage): void
    {
        if ($percentage > 0 && $percentage <= 100) {
            $this->prix -= $this->prix * ($percentage / 100);
        }
    }

    public function getNom(): string { return $this->nom; }
    public function getDescription(): string { return $this->description; }
    public function getPrix(): float { return $this->prix; }
    public function getStock(): int { return $this->stock; }
    public function getCategorie(): string { return $this->categorie; }
}

$products = [
    new Product(1, "Clavier mécanique", "Clavier RGB switches mécaniques", 120.00, 5, "Informatique"),
    new Product(2, "Souris gaming", "Souris haute précision", 60.00, 8, "Informatique"),
    new Product(3, "Banc de musculation", "Banc pliable multifonction", 220.00, 3, "Fitness"),
    new Product(4, "Montre connectée", "Suivi sportif et santé", 150.00, 6, "High-tech"),
    new Product(5, "Casque Bluetooth", "Réduction de bruit active", 180.00, 4, "Audio"),
];

$totalStock = 0;
$totalValue = 0;

foreach ($products as $product) {
    $totalStock += $product->getStock();
    $totalValue += $product->getPrix() * $product->getStock();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Catalogue produits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4">Catalogue des produits</h2>

    <div class="row">
        <?php foreach ($products as $product): ?>
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title"><?= $product->getNom() ?></h5>
                        <p class="text-muted"><?= $product->getCategorie() ?></p>

                        <p class="card-text"><?= $product->getDescription() ?></p>

                        <ul class="list-group list-group-flush mb-3">
                            <li class="list-group-item">
                                Prix HT : <?= number_format($product->getPrix(), 2) ?> €
                            </li>
                            <li class="list-group-item">
                                Stock : <?= $product->getStock() ?>
                            </li>
                        </ul>

                        <span class="badge <?= $product->isInStock() ? 'bg-success' : 'bg-danger' ?>">
                            <?= $product->isInStock() ? 'En stock' : 'Rupture' ?>
                        </span>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="card mt-4 shadow-sm">
        <div class="card-body">
            <h4>Résumé du catalogue</h4>
            <p>
                <strong>Total d’articles en stock :</strong> <?= $totalStock ?>
            </p>
            <p>
                <strong>Valeur totale du catalogue :</strong>
                <?= number_format($totalValue, 2) ?> €
            </p>
        </div>
    </div>
</div>

</body>
</html>