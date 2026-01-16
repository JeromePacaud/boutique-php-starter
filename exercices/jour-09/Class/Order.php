<?php

require "User.php";
require "Cart.php";

class Order
{
    private int $id;
    private User $user;
    private DateTime $orderDate; // d-m-Y h:m
    private string $status;

    /** @var CartItem[] */
    private array $items;

    public function __construct(int $id, User $user, Cart $cart, string $status = "en préparation")
    {
        $this->id = $id;
        $this->user = $user;
        $this->orderDate = new DateTime();
        $this->$status = $status;

        foreach ($cart->getItems() as $item) {
            $this->items[] = $item;
        }
    }

    // Getters

    public function getTotal(): float
    {
        $total = 0;

        foreach ($this->items as $item) {
            $total += $item->getTotal();
        }

        return $total;
    }

    public function getItemCount(): int
    {
        return count($this->items);
    }

    public function getOrderId(): int
    {
        return $this->id;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function getOrderDate(): string
    {
        return $this->orderDate->format("d-m-Y" . " à " . "h:m:s");
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    /** @return CartItem[] */
    public function getItems(): array
    {
        return $this->items;
    }

    // setters

    public function setStatus($status): void
    {
        $this->status = $status;
    }
}
