<?php

function greet(): string
{
    return "Bienvenu sur la boutique";
}

function greetClient(string $name): string
{
    return "Bonjour $name";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2><?= greet() ?></h2>
    <h2><?= greetClient("Jérôme") ?></h2>
    <h2><?= greetClient("Anne-Laure") ?></h2>
    <h2><?= greetClient("Elyes") ?></h2>
</body>

</html>