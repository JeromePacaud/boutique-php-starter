<?php

class CartItem
{
    private Product $product;
    private int $quantity;

    public function __construct(Product $product, int $quantity)
    {
        $this->product = $product;
        $this->quantity = $quantity;
    }

    // Getter
    public function getProduct(): Product
    {
        return $this->product;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    // Method
    public function getTotal(): int
    {
        return $this->product->getPriceIncludingTax() * $this->quantity;
    }

    public function incremente($nb = 1): void
    {
        $this->quantity += $nb;
    }

    public function decremente($nb = 1): void
    {
        $this->quantity -= $nb;
    }
}
