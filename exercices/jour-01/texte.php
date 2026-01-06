<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$brand = "Nike";
$model = "Air Max";
$format = "Chassure: %s %s";
$price = 99.99;
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
echo $brand . " " . $model . "\n";
echo "{$brand} {$model} \n";
echo sprintf($format, $brand, $model);
echo "\nPrix : $price €\n";
echo 'Prix : $price €';
?>
    </pre>
</body>

</html>