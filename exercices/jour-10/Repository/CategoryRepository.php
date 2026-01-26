<?php

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "Entity" . DIRECTORY_SEPARATOR . "Category.php";


class CategoryRepository
{
    public function __construct(private PDO $pdo) {}

    //READ -> fetch
    public function find(int $id): ?Category
    {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM categories WHERE id = ?;"
        );
        $stmt->execute([$id]);
        $data = $stmt->fetch();

        return $data ? $this->hydrate($data) : null;
    }

    // READ -> fetchAll()
    public function findAll(): array
    {
        $stmt = $this->pdo->query(
            "SELECT * FROM categories;"
        );
        $stmt->execute();

        return array_map([$this, 'hydrate'], $stmt->fetchAll());
    }

    // CREATE
    public function save(Category $category): void
    {
        $stmt = $this->pdo->prepare(
            "INSERT INTO categories (nom, description) 
            VALUES (?, ?);"
        );
        $stmt->execute([
            $category->getName(),
            $category->getDescription()
        ]);
    }

    // UPDATE
    public function update(Category $category): void
    {
        $stmt = $this->pdo->prepare(
            "UPDATE categories SET 
            name = ?,
            description = ?
            WHERE id = ?;"
        );
        $stmt->execute([
            $category->getName(),
            $category->getDescription(),
            $category->getID()
        ]);
    }

    // DELETE
    public function delete(int $id): void
    {
        $stmt = $this->pdo->prepare(
            "DELETE FROM categories WHERE ID = ?;"
        );
        $stmt->execute([$id]);
    }

    public function findWithProductsById(int $categoryId, ProductRepository $productRepo): ?Category
    {
        // Récuperer une categorie
        $category = $this->find($categoryId);

        if ($category === null) {
            // gérer les erreurs
            return null;
        }

        // Récupérer tous les produits associé à la categorie
        $products = $productRepo->findByCategory($categoryId);

        // Associer les produits à la categorie
        foreach ($products as $product) {
            $product->setCategory($category);
            $category->addProduct($product);
        }

        return $category;
    }

    public function findWithProducts(ProductRepository $productRepo): array
    {
        // Récuperer toutes les catégories
        $categories = $this->findAll();

        if (empty($categories)) {
            // gérer les erreurs
            return [];
        }

        // Récuperer les produits pour chaque catégories
        foreach ($categories as $category) {
            $categoryId = $category->getId();

            // Récupérer les les produit de chaque catégories
            $products = $productRepo->findByCategory($categoryId);

            // Associer les produits à la categorie
            foreach ($products as $product) {
                // Associer la catégorie au produit
                $product->setCategory($category);
                // Ajouter le produit à la catégorie
                $category->addProduct($product);
            }
        }


        return $categories;
    }

    // FIND BY SEARCH TERMS
    public function search(string $term): array
    {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM categories WHERE nom LIKE ?;"
        );
        $stmt->execute(["%" . $term . "%"]);

        return array_map([$this, 'hydrate'], $stmt->fetchAll());
    }

    private function hydrate(array $data): Category
    {
        return new Category(
            id: (int) $data["id"],
            name: (string) $data["nom"],
            description: (string) $data["description"]
        );
    }
}
