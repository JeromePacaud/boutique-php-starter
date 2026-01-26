<?php

class Category
{
    private int $id;
    private string $name;
    private string $description;
    /** @var Product[] */
    private array $products = [];

    public function __construct(int $id, string $name, string $description)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
    }

    public function addProduct(Product $product): void
    {
        $this->products[] = $product;
    }

    /** @return Product[] */
    public function getProducts(): array
    {
        return $this->products;
    }

    public function getSlug(): string
    {
        return strtolower(str_replace(' ', '-', $this->name));
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getId(): int
    {
        return $this->id;
    }
}
