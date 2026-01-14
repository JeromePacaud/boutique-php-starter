<?php

$a = 0;
$b = "";
$c = null;
$d = false;
$e = "0";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <pre>
        <?php
        var_dump($a == $b);
        var_dump($a == $c);
        var_dump($a == $d);
        var_dump($a == $e);

        var_dump($a == $b);
        var_dump($a === $c);
        var_dump($a === $d);
        var_dump($a === $e);
        ?>
    </pre>
</body>

</html>