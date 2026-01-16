<?php

class Car
{
    public string $brand;
    public string $model;
    public string $year;

    public function __construct(string $brand, string $model, string $year)
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->year = $year;
    }

    public function getAge(): string
    {
        $age = (int)date('Y') - (int)$this->year;
        return <<<HTML
            <p>$age ans</p>
HTML;
    }

    public function display(): string
    {
        return <<<HTML
            <p>Marque: $this->brand</p>
            <p>Modèle: $this->model</p>
            <p>Année: $this->year</p>
HTML;
    }
}

$car1 = new Car(brand: "Toyota", model: "Yaris", year: "2002");
$car2 = new Car(brand: "Nissan", model: "Skyline", year: "2006");
$car3 = new Car(brand: "Ford", model: "Mustang", year: "1964");

$allCar = [$car1, $car2, $car3]

?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Bonjour</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="row">
            <?php foreach ($allCar as $car): ?>
                <div class="col-lg-4 card p-4">
                    <div class="card-body">
                        <h1 class="card-title mb-4">Voiture</h1>
                        <?= $car->getAge() ?>
                        <?= $car->display() ?>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</body>

</html> 