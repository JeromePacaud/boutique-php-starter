<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$title = "page-catalogue";

$products = [
    [
        "addDate" => new DateTime("2026-01-01"),
        "discount" => 0,
        "category" => "accessoire",
        "image" => "./img/clavier.jpg",
        "name" => "clavier",
        "description" => "un super clavier.",
        "price" => 49.99,
        "rating" => 5,
        "stock" => 50
    ],
    [
        "addDate" => new DateTime("2025-01-01"),
        "discount" => 50,
        "category" => "accessoire",
        "image" => "./img/ecran.jpg",
        "name" => "écran",
        "description" => "un superbe écran.",
        "price" => 149.99,
        "rating" => 4.5,
        "stock" => 15
    ],
    [
        "addDate" => new DateTime("2026-01-01"),
        "discount" => 0,
        "category" => "accessoire",
        "image" => "./img/souris.jpg",
        "name" => "souris",
        "description" => "une superbe souris.",
        "price" => 69.99,
        "rating" => 3.5,
        "stock" => 60
    ],
    [
        "addDate" => new DateTime("2025-12-24"),
        "discount" => 0,
        "category" => "accessoire",
        "image" => "./img/tapis.jpg",
        "name" => "tapis",
        "description" => "un tapis de souris",
        "price" => 39.99,
        "rating" => 5,
        "stock" => 18
    ],
    [
        "addDate" => new DateTime("2025-12-01"),
        "discount" => 10,
        "category" => "tech",
        "image" => "./img/tour.jpg",
        "name" => "tour gaming",
        "description" => "vendue sans le chat",
        "price" => 999.99,
        "rating" => 5,
        "stock" => 0
    ],
    [
        "addDate" => new DateTime("2026-01-01"),
        "discount" => 0,
        "category" => "tech",
        "image" => "./img/setup.jpg",
        "name" => "setup complet",
        "description" => "un setup gaming complet",
        "price" => 1249.99,
        "rating" => 5,
        "stock" => 3
    ],
    [
        "addDate" => new DateTime("2025-10-01"),
        "discount" => 30,
        "category" => "tech",
        "image" => "./img/setup.jpg",
        "name" => "setup complet",
        "description" => "un setup gaming complet",
        "price" => 1249.99,
        "rating" => 5,
        "stock" => 3
    ],
    [
        "addDate" => new DateTime("2025-11-01"),
        "discount" => 50,
        "category" => "meuble",
        "image" => "./img/setup.jpg",
        "name" => "Chaise",
        "description" => "un setup gaming complet",
        "price" => 129.99,
        "rating" => 5,
        "stock" => 3
    ],
    [
        "addDate" => new DateTime("2025-11-01"),
        "discount" => 50,
        "category" => "meuble",
        "image" => "./img/setup.jpg",
        "name" => "bureau",
        "description" => "un setup gaming complet",
        "price" => 249.99,
        "rating" => 5,
        "stock" => 3
    ],
    [
        "addDate" => new DateTime("2026-01-01"),
        "discount" => 0,
        "category" => "accessoire",
        "image" => "./img/clavier.jpg",
        "name" => "clavier",
        "description" => "un super clavier.",
        "price" => 49.99,
        "rating" => 5,
        "stock" => 50
    ],
    [
        "addDate" => new DateTime("2025-01-01"),
        "discount" => 50,
        "category" => "accessoire",
        "image" => "./img/ecran.jpg",
        "name" => "écran",
        "description" => "un superbe écran.",
        "price" => 149.99,
        "rating" => 4.5,
        "stock" => 15
    ],
    [
        "addDate" => new DateTime("2026-01-01"),
        "discount" => 0,
        "category" => "accessoire",
        "image" => "./img/souris.jpg",
        "name" => "souris",
        "description" => "une superbe souris.",
        "price" => 69.99,
        "rating" => 3.5,
        "stock" => 60
    ],
    [
        "addDate" => new DateTime("2025-12-24"),
        "discount" => 0,
        "category" => "accessoire",
        "image" => "./img/tapis.jpg",
        "name" => "tapis",
        "description" => "un tapis de souris",
        "price" => 39.99,
        "rating" => 5,
        "stock" => 18
    ],
    [
        "addDate" => new DateTime("2025-12-01"),
        "discount" => 10,
        "category" => "tech",
        "image" => "./img/tour.jpg",
        "name" => "tour gaming",
        "description" => "vendue sans le chat",
        "price" => 999.99,
        "rating" => 5,
        "stock" => 0
    ],
    [
        "addDate" => new DateTime("2026-01-01"),
        "discount" => 0,
        "category" => "tech",
        "image" => "./img/setup.jpg",
        "name" => "setup complet",
        "description" => "un setup gaming complet",
        "price" => 1249.99,
        "rating" => 5,
        "stock" => 3
    ],
    [
        "addDate" => new DateTime("2025-10-01"),
        "discount" => 30,
        "category" => "tech",
        "image" => "./img/setup.jpg",
        "name" => "setup complet",
        "description" => "un setup gaming complet",
        "price" => 1249.99,
        "rating" => 5,
        "stock" => 3
    ],
    [
        "addDate" => new DateTime("2025-11-01"),
        "discount" => 50,
        "category" => "meuble",
        "image" => "./img/setup.jpg",
        "name" => "Chaise",
        "description" => "un setup gaming complet",
        "price" => 129.99,
        "rating" => 5,
        "stock" => 3
    ],
    [
        "addDate" => new DateTime("2025-11-01"),
        "discount" => 50,
        "category" => "meuble",
        "image" => "./img/setup.jpg",
        "name" => "bureau",
        "description" => "un setup gaming complet",
        "price" => 249.99,
        "rating" => 5,
        "stock" => 3
    ],
];
