<?php

$age = rand(10, 80);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p><?= $age ?></p>
    <p>
        <?php
        if ($age < 18) {
            echo "A minoooooooor";
        } elseif ($age >= 18 && $age <= 25) {
            echo "Young adult";
        } elseif ($age >= 26 && $age <= 64) {
            echo "Adult";
        } else {
            echo "Senior";
        }
        ?>
    </p>
</body>

</html>