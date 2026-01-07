<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$firstnames = ["Pierre", "Marie", "Jean", "John", "Alan"];
$i = 1;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <ul>
        <?php foreach ($firstnames as $firstname): ?>
            <li><?php echo $i++ . "." . $firstname ?></li>
        <?php endforeach ?>
    </ul>
</body>

</html>