<?php

class Category
{
    private int $id;
    private string $name;
    private string $description;

    public function __construct(int $id, string $name, string $description)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
    }

    public function getSlug(): string
    {
        return strtolower(str_replace(' ', '-', $this->name));
    }

    public function getID(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function toArray(): array
    {
        return [
            $this->getID() => [
                "nom" => $this->getName(),
                "description" => $this->description,
            ]
        ];
    }
}