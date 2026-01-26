<?php

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "Entity" . DIRECTORY_SEPARATOR . "Product.php";


class ProductRepository3
{
    public function __construct(private PDO $pdo) {}

    // READ -> fetch()
    public function find(int $id): ?Product
    {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM products WHERE id = ?"
        );
        $stmt->execute([$id]);
        $data = $stmt->fetch();

        return $data ? $this->hydrate($data) : null;
    }

    // READ -> fetcAll()
    public function findAll(): array
    {
        $stmt = $this->pdo->query(
            "SELECT * FROM products"
        );

        return array_map([$this, 'hydrate'], $stmt->fetchAll());
    }

    // Create
    public function save(Product $product): void
    {
        $stmt = $this->pdo->prepare(
            "INSERT INTO products (name, price, stock) VALUES (?, ?, ?)"
        );
        $stmt->execute([
            $product->getName(),
            $product->getPrice(),
            $product->getStock()
        ]);
    }

    // UPDATE
    public function update(Product $product): void
    {
        $stmt = $this->pdo->prepare(
            "UPDATE products SET name = ?, price = ?, stock = ? WHERE id = ?"
        );
        $stmt->execute([
            $product->getName(),
            $product->getPrice(),
            $product->getStock(),
            $product->getId()
        ]);
    }

    // DELETE
    public function delete(int $id): void
    {
        $stmt = $this->pdo->prepare("DELETE FROM products WHERE id = ?");
        $stmt->execute([$id]);
    }

    // Find by Category
    public function findByCategory(int $categoryId): array
    {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM products WHERE category_id = ?;"
        );
        $stmt->execute([$categoryId]);

        return array_map([$this, 'hydrate'], $stmt->fetchAll());
    }

    // Find by stock
    public function findInStock(): array
    {
        $stmt = $this->pdo->query(
            "SELECT * FROM products WHERE stock > 0;"
        );

        return array_map([$this, 'hydrate'], $stmt->fetchAll());
    }

    // Find by price range
    public function findByPriceRange(float $min, float $max): array
    {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM products 
            WHERE price BETWEEN ? AND ?
            ORDER BY price DESC;"
        );
        $stmt->execute([
            $min,
            $max
        ]);

        return array_map([$this, 'hydrate'], $stmt->fetchAll());
    }

    // Find by search terms
    public function search(string $term): array
    {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM products WHERE name LIKE ?;"
        );
        $stmt->execute(["%" . $term . "%"]);

        return array_map([$this, 'hydrate'], $stmt->fetchAll());
    }

    // Hydratation : tableau → objet
    private function hydrate(array $data): Product
    {
        // objet Category temporaire
        $category = new Category(
            id: 0,
            name: $data["category"],
            description: ""
        );

        return new Product(
            id: (int) $data["id"],
            name: $data["name"],
            description: $data["description"],
            price: (float) $data["price"],
            stock: (int) $data["stock"],
            category: $category
        );
    }
}
