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

//  CREATE 
if ($_SERVER["REQUEST_METHOD"] === "POST" && $_POST["action"] === "add") {
    $stmt = $pdo->prepare(
        "INSERT INTO products (name, price, stock, category) VALUES (?, ?, ?, ?)"
    );
    $stmt->execute([
        $_POST["name"],
        $_POST["price"],
        $_POST["stock"],
        $_POST["category"]
    ]);

    header("Location: admin-produits.php");
    exit;
}

//  UPDATE 
if ($_SERVER["REQUEST_METHOD"] === "POST" && $_POST["action"] === "update") {
    $stmt = $pdo->prepare(
        "UPDATE products SET name = ?, price = ?, stock = ?, category = ? WHERE id = ?"
    );
    $stmt->execute([
        $_POST["name"],
        $_POST["price"],
        $_POST["stock"],
        $_POST["category"],
        $_POST["id"]
    ]);

    header("Location: admin-produits.php");
    exit;
}

//  DELETE 
if (isset($_GET["delete"])) {
    $stmt = $pdo->prepare("DELETE FROM products WHERE id = ?");
    $stmt->execute([$_GET["delete"]]);

    header("Location: admin-produits.php");
    exit;
}

//  READ 
$products = $pdo->query("SELECT * FROM products ORDER BY id DESC")
    ->fetchAll(PDO::FETCH_ASSOC);

//  PRODUIT À MODIFIER 
$productToEdit = null;
if (isset($_GET["edit"])) {
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->execute([$_GET["edit"]]);
    $productToEdit = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Admin Produits</title>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-5">

        <h1 class="mb-4 text-center">Administration des produits</h1>

        <!-- LISTE PRODUITS -->
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Nom</th>
                    <th>Prix (€)</th>
                    <th>Stock</th>
                    <th>Categories</th>
                    <th width="180">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= htmlspecialchars($product["name"]) ?></td>
                        <td><?= number_format($product["price"], 2) ?></td>
                        <td><?= $product["stock"] ?></td>
                        <td><?= $product["category"] ?></td>
                        <td>
                            <a
                                href="?edit=<?= $product["id"] ?>"
                                class="btn btn-warning btn-sm">
                                Modifier
                            </a>

                            <a
                                href="?delete=<?= $product["id"] ?>"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Supprimer ce produit ?')">
                                Supprimer
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <hr class="my-5">

        <!-- FORMULAIRE AJOUT / MODIFICATION -->
        <h2>
            <?= $productToEdit ? "Modifier le produit" : "Ajouter un produit" ?>
        </h2>

        <form method="POST" class="row g-3 mt-2">

            <input
                type="hidden"
                name="action"
                value="<?= $productToEdit ? "update" : "add" ?>">

            <?php if ($productToEdit): ?>
                <input type="hidden" name="id" value="<?= $productToEdit["id"] ?>">
            <?php endif; ?>

            <div class="col-md-6">
                <label class="form-label">Nom</label>
                <input
                    type="text"
                    name="name"
                    class="form-control"
                    required
                    value="<?= $productToEdit["name"] ?? "" ?>">
            </div>

            <div class="col-md-3">
                <label class="form-label">Prix</label>
                <input
                    type="number"
                    step="0.01"
                    name="price"
                    class="form-control"
                    required
                    value="<?= $productToEdit["price"] ?? "" ?>">
            </div>

            <div class="col-md-3">
                <label class="form-label">Stock</label>
                <input
                    type="number"
                    name="stock"
                    class="form-control"
                    required
                    value="<?= $productToEdit["stock"] ?? "" ?>">
            </div>

            <div class="col-md-3">
                <label class="form-label">Category</label>
                <input
                    type="text"
                    name="category"
                    class="form-control"
                    required
                    value="<?= $productToEdit["category"] ?? "" ?>">
            </div>

            <div class="col-12">
                <button class="btn btn-success">
                    <?= $productToEdit ? "Mettre à jour" : "Ajouter" ?>
                </button>

                <?php if ($productToEdit): ?>
                    <a href="admin-produits.php" class="btn btn-secondary ms-2">
                        Annuler
                    </a>
                <?php endif; ?>
            </div>

        </form>

    </div>

</body>

</html>