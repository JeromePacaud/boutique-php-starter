<?php

$person = [
    "name" => "Pacaud",
    "firstame" => "Jérôme",
    "city" => "Grenoble",
    "job" => "developpeur",
];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php foreach ($person as $key => $value): ?>
        <strong><?= $key ?></strong>: <?= $value ?> <br>
    <?php endforeach; ?>
</body>

</html>