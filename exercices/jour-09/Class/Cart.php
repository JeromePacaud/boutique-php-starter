<?php
require_once "Product.php";
require_once "CartItem.php";


class Cart
{
    /** @var CartItem[] */
    private array $items = [];

    public function addProduct(Product $product, int $quantity = 1): void
    {
        $id = $product->getID();

        if (isset($this->items[$id])) {
            $this->items[$id]->incremente($quantity);
        } else {
            $this->items[$id] = new CartItem($product, $quantity);
        }
    }

    public function updateProduct($productId, $quantity): void
    {
        if (isset($this->items[$productId]) && $quantity > 0) {
            $currentQuantity = $this->items[$productId]->getQuantity();

            if ($currentQuantity < $quantity) {
                $this->items[$productId]->incremente($quantity);
            } else {
                $this->items[$productId]->decremente($quantity);
            }
        }
    }

    public function removeProduct($productId): void
    {
        if (isset($this->items[$productId])) {
            unset($this->items[$productId]);
        }
    }

    /** @return CartItem[] */
    public function clear(): array
    {
        return $this->items = [];
    }

    // Getters
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

    public function getCount(): int
    {
        return count($this->items);
    }
}
