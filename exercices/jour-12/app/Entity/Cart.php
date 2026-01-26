<?php

namespace App\Entity;


use App\Entity\CartItem;
use App\Entity\Product;


class Cart
{
    /** @var CartItem[] */
    private array $items = [];

    public function addProduct(Product $product, int $quantity = 1): void
    {
        $id = $product->getId();

        if (isset($this->items[$id])) {
            // Produit déjà dans le panier → augmenter quantité progressivement
            for ($i = 0; $i < $quantity; $i++) {
                $this->items[$id]->increment();
            }
        } else {
            // Nouveau produit
            $this->items[$id] = new CartItem($product, $quantity);
        }
    }

    public function removeProduct(int $productId): void
    {
        if (isset($this->items[$productId])) {
            unset($this->items[$productId]);
        }
    }

    public function updateProduct(int $productId, int $quantity): void
    {
        if (isset($this->items[$productId]) && $quantity >= 0) {
            $currentQuantity = $this->items[$productId]->getQuantity();

            if ($quantity > $currentQuantity) {
                for ($i = 0; $i < ($quantity - $currentQuantity); $i++) {
                    $this->items[$productId]->increment();
                }
            } elseif ($quantity < $currentQuantity) {
                for ($i = 0; $i < ($currentQuantity - $quantity); $i++) {
                    $this->items[$productId]->decrement();
                }
            }
        }
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function getTotal(): float
    {
        $total = 0;

        foreach ($this->items as $item) {
            $total += $item->getTotal();
        }

        return $total;
    }

    public function count(): int
    {
        return count($this->items);
    }

    public function clear(): void
    {
        $this->items = [];
    }
}
