<?php

namespace App\Entity;

use App\Entity\User;
use App\Entity\Cart;
use App\Entity\CartItem;
use DateTime;


class Order
{
    private int $id;
    private User $user;

    /** @var CartItem[] */
    private array $items = [];

    private DateTime $date;
    private string $status;

    public function __construct(int $id, User $user, Cart $cart, string $status = "En cours")
    {
        $this->id = $id;
        $this->user = $user;
        $this->date = new DateTime();
        $this->status = $status;

        foreach ($cart->getItems() as $item) {
            $this->items[] = $item;
        }
    }

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

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    // Getters 
    public function getId(): int
    {
        return $this->id;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function getDate(): string
    {
        return $this->date->format('d/m/Y H:i');
    }

    public function getStatus(): string
    {
        return $this->status;
    }
}
