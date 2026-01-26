<?php

class Product
{
    // L'accès aux éléments protégés est limité à la classe elle-même, ainsi qu'aux classes qui en héritent et parente.
    public function __construct(
        protected string $name,
        protected float $price
    ) {}

    public function getPriceTTC(): float
    {
        return $this->price * 1.2;
    }
}

class DigitalProduct extends Product
{
    public function __construct(
        string $name,
        float $price,
        private string $dowloadUrl,
    ) {
        // Appeler le constructeur de la classe patente
        parent::__construct($name, $price);
    }

    public function getDownloadLink(): string
    {
        return $this->dowloadUrl;
    }

    public function getPriceTTC(bool $isReduceVat = false, float $vat = 0): float
    {
        if ($isReduceVat) {
            return $this->price * 1 + $vat;
        }
        return parent::getPriceTTC();
    }
}

class PhysicalProduct extends Product
{
    public function __construct(
        string $name,
        float $price,
        private int $height,
        private int $width
    ) {
        parent::__construct($name, $price);
    }
}


$product = new Product("clavier", 100.00);
$digitalProduct = new DigitalProduct("jeux-video", 100.00, 'https://downloadLink.com');

echo $product->getPriceTTC();
echo "<br>";
echo $digitalProduct->getPriceTTC();
echo "<br>";
echo $digitalProduct->getPriceTTC(true, 10);
echo "<br>";
echo $digitalProduct->getDownloadLink();
