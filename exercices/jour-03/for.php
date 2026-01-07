<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <?php for ($i = 1; $i <= 10; $i++): ?>
            <?= $i ?>
        <?php endfor; ?>
    </div>

    <div>
        <?php for ($i = 2; $i <= 20; $i++): ?>
            <?= $i ?>
        <?php endfor; ?>
    </div>

    <div>
        <?php for ($i = 10; $i >= 0; $i--): ?>
            <?= $i ?>
        <?php endfor; ?>
    </div>

    <div>
        <?php for ($i = 1; $i <= 10; $i++): ?>
            <?= $i * 7 ?>
        <?php endfor; ?>
    </div>
</body>

</html>