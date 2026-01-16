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


$product = new Product(
    1,
    "Clavier mécanique",
    "Clavier RGB avec switches mécaniques",
    120.00,
    5,
    "Informatique"
);

$product->applyDiscount(10);
$product->reduceStock(2);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Produit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <h3 class="card-title"><?= $product->getNom() ?></h3>
            <p class="text-muted"><?= $product->getCategorie() ?></p>

            <p><?= $product->getDescription() ?></p>

            <ul class="list-group list-group-flush mb-3">
                <li class="list-group-item">
                    Prix HT : <?= number_format($product->getPrix(), 2) ?> €
                </li>
                <li class="list-group-item">
                    Prix TTC : <?= number_format($product->getPriceIncludingTax(), 2) ?> €
                </li>
                <li class="list-group-item">
                    Stock :
                    <?php if ($product->isInStock()): ?>
                        <span class="badge bg-success"><?= $product->getStock() ?> disponibles</span>
                    <?php else: ?>
                        <span class="badge bg-danger">Rupture</span>
                    <?php endif; ?>
                </li>
            </ul>

            <button class="btn btn-primary" <?= !$product->isInStock() ? 'disabled' : '' ?>>
                Ajouter au panier
            </button>
        </div>
    </div>
</div>

</body>
</html>


