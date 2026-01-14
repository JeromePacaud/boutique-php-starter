<?php

try {
    $pdo = new PDO(
        "mysql:host=localhost;dbname=boutique;charset=utf8mb4",
        "dev",
        "dev",
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
    echo "Connexion réussie !<br>";
} catch (PDOException $e) {
    echo 'Erreur: ' . $e->getMessage();
}

$pdo->exec("
    CREATE DATABASE IF NOT EXISTS boutique
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci
");

echo "Base de données créée<br>";

$pdo->exec("USE boutique");

$pdo->exec("
    CREATE TABLE IF NOT EXISTS products (
        id INT PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(255) NOT NULL,
        description TEXT,
        price DECIMAL(10,2) NOT NULL,
        stock INT DEFAULT 0,
        category VARCHAR(100),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )
");

echo "Table créée<br>";

$pdo->exec("
    INSERT INTO products (name, description, price, stock, category) VALUES
    ('T-shirt Blanc', 'T-shirt 100% coton', 29.99, 50, 'Vêtements'),
    ('Jean Slim', 'Jean stretch confortable', 79.99, 30, 'Vêtements'),
    ('Casquette NY', 'Casquette brodée', 19.99, 100, 'Accessoires'),
    ('Baskets Sport', 'Chaussures de running', 89.99, 25, 'Chaussures'),
    ('Sac à dos', 'Sac 20L étanche', 49.99, 15, 'Accessoires')
");

$pdo->exec("
    INSERT INTO products (name, description, price, stock, category) VALUES
    ('sweet-shirt Blanc', 'T-shirt 100% coton', 29.99, 50, 'Vêtements'),
    ('Jean Regular', 'Jean stretch confortable', 79.99, 30, 'Vêtements'),
    ('Casquette Phily', 'Casquette brodée', 19.99, 100, 'Accessoires'),
    ('Sneakers', 'Chaussures de ville', 89.99, 25, 'Chaussures'),
    ('Sac à main', 'Sac 20L étanche', 49.99, 15, 'Accessoires')
");

echo "Données insérées";

$search = $_GET['search'] ?? '';
$products = [];

if (!empty($search)) {
    $query = "SELECT * FROM products WHERE name LIKE ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['%' . $search . '%']);
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="fr">

<!DOCTYPE html>
<html lang="en">

<div class="row">
    <div class="col-md-4">
        <h1 class="text-center">$_GET</h1>
        <pre>
            <?= var_dump($_GET) ?>
        </pre>
    </div>
    <div class="col-md-4">
        <h1 class="text-center">$products</h1>
        <pre>
            <?= var_dump($products) ?>
        </pre>
    </div>
</div>

<head>
    <meta charset="UTF-8">
    <title>Recherche produits</title>

    <!-- Bootstrap 5 CDN -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-5">

        <h1 class="mb-4 text-center">Recherche de produits</h1>

        <!-- Formulaire de recherche -->
        <form method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Rechercher un produit..." value="<?= htmlspecialchars($search) ?>">
                <button class="btn btn-primary" type="submit">
                    Rechercher
                </button>
            </div>
        </form>

        <?php if (!empty($search)): ?>

            <?php if (count($products) > 0): ?>

                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>Nom</th>
                                <th>Prix</th>
                                <th>Stock</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products as $product): ?>
                                <tr>
                                    <td><?= htmlspecialchars($product['name']) ?></td>
                                    <td><?= number_format($product['price'], 2) ?> €</td>
                                    <td>
                                        <?php if ($product['stock'] > 0): ?>
                                            <span class="badge bg-success">
                                                <?= $product['stock'] ?>
                                            </span>
                                        <?php else: ?>
                                            <span class="badge bg-danger">Rupture</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            <?php else: ?>
                <div class="alert alert-warning text-center">
                    Aucun produit trouvé pour <strong><?= htmlspecialchars($search) ?></strong>
                </div>
            <?php endif; ?>

        <?php else: ?>
            <div class="alert alert-info text-center">
                Entrez un mot-clé pour lancer la recherche
            </div>
        <?php endif; ?>

    </div>

</body>

</html>