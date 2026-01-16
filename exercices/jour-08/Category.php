<?php

class Category
{
    private int $id;
    private string $nom;
    private string $description;

    public function __construct(int $id, string $nom, string $description)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
    }

    public function getSlug(): string
    {
        return strtolower(str_replace(' ', '-', $this->nom));
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
$categories = [
    new Category(1, "Informatique Gaming", "Produits dédiés au gaming"),
    new Category(2, "Fitness & Santé", "Équipements et accessoires sportifs"),
    new Category(3, "Maison Connectée", "Objets intelligents pour la maison"),
];

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Catégories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4">Liste des catégories</h2>

    <div class="row">
        <?php foreach ($categories as $category): ?>
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title"><?= $category->getNom() ?></h5>
                        <p class="card-text"><?= $category->getDescription() ?></p>

                        <span class="badge bg-secondary">
                            Slug : <?= $category->getSlug() ?>
                        </span>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

</body>
</html>