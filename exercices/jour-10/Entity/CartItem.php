<?php

require_once 'Product.php';

class CartItem
{
    private Product $product;
    private int $quantity;

    public function __construct(Product $product, int $quantity)
    {
        $this->product = $product;
        $this->quantity = $quantity;
    }

    public function getTotal(): float
    {
        return $this->product->getPrice() * $this->quantity;
    }

    public function increment($number = 1): void
    {
        $this->quantity += $number;
    }

    public function decrement($number = 1): void
    {
        if ($this->quantity > 0) {
            $this->quantity -= $number;
        }
    }

    public function getProduct(): Product
    {
        return $this->product;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }
}
