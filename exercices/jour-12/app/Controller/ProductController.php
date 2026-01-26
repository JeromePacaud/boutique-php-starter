<?php

namespace App\Controller;

use App\Entity\Database;
use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;


class ProductController
{
    private ProductRepository $productRepository;
    private CategoryRepository $categoryRepository;

    public function __construct()
    {
        $pdo = Database::getInstance();
        $this->categoryRepository = new CategoryRepository($pdo);
        $this->productRepository = new ProductRepository($pdo, $this->categoryRepository);
    }

    // GET/produits
    public function index(): void
    {
        $title = "Catalogue produits";
        $products = $this->productRepository->findAll();
        require __DIR__ . "/../../views/products/index.php";
    }

    // GET/product?id=X
    public function show($id): void
    {
        // Sécurité supplémentaire
        if ($id <= 0) {
            $this->redirect("/products");
            return;
        }

        // Sinon on récupère le produit à l'id=X
        $product = $this->productRepository->find((int) $id);

        if (!$product) {
            http_response_code(404);
            $title = "404 Not Found";
            require __DIR__ . "/../../views/errors/404.php";
            return;
        }

        $title = "Détails produits";
        require __DIR__ . "/../../views/products/show.php";
    }

    protected function redirect(string $url): void
    {
        header("Location: $url");
        exit;
    }
}
