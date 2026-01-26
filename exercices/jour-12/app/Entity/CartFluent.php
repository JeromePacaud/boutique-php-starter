<?php

namespace App\Entity;

use App\Entity\CartItem;
use App\Entity\Product;


class CartFluent
{
    /** @var CartItem[] */
    private array $items = [];

    public function add(Product $product, int $quantity = 1): self
    {
        $id = $product->getId();

        if (isset($this->items[$id])) {
            for ($i = 0; $i < $quantity; $i++) {
                $this->items[$id]->increment();
            }
        } else {
            $this->items[$id] = new CartItem($product, $quantity);
        }

        return $this;
    }

    public function remove(int $productId): self
    {
        if (isset($this->items[$productId])) {
            unset($this->items[$productId]);
        }

        return $this;
    }

    public function update(int $productId, int $quantity): self
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

        return $this;
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

    public function clear(): self
    {
        $this->items = [];
        return $this;
    }
}
