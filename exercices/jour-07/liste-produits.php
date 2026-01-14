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

echo "Données insérées";

// SELECT avec paramètre
$stmt = $pdo->prepare("SELECT * FROM products");
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Document</title>
</head>

<body class="bg-light">
    <div class="container mt-5 gap-2">
        <?php foreach ($products as $product): ?>
            <div class="card p-4">
                <div class="card-body">
                    <div class="card-title">
                        <h4><?= $product["name"] ?></h4>
                    </div>
                    <p><?= $product["price"] ?> €</p>
                    <p><?= $product["stock"] ?></p>
                    <p><?= $product["description"] ?></p>
                </div>
            </div>
        <?php endforeach ?>
    </div>
    </div>
</body>

</html>