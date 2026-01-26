<?php

require_once 'Category.php';

class Product
{
    private int $id;
    private string $name;
    private string $description;
    private float $price;
    private int $stock;
    private Category $category;

    public function __construct(
        int $id,
        string $name,
        string $description,
        float $price,
        int $stock,
        Category $category
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->stock = $stock;
        $this->category = $category;
    }

    public function isInStock(): bool
    {
        return $this->stock > 0;
    }

    public function reduceStock(int $quantity): void
    {
        if ($quantity > 0 && $quantity <= $this->stock) {
            $this->stock -= $quantity;
        }
    }

    public function applyDiscount(float $percentage): void
    {
        if ($percentage > 0 && $percentage <= 100) {
            $this->price -= $this->price * ($percentage / 100);
        }
    }

    // SETTERS
    public function setCategory(Category $category): void
    {
        $this->category = $category;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    // Getters

    public function getID(): int
    {
        return $this->id;
    }

    public function getPriceIncludingTax(float $vat = 20): float
    {
        return $this->price * (1 + $vat / 100);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getStock(): int
    {
        return $this->stock;
    }

    public function getCategory(): Category
    {
        return $this->category;
    }
}
