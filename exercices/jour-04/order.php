<?php

$status = "validated";
$color = "orange";

switch ($status) {
    case "standby":
        $color = "orange";
        break;
    case "validated":
        $color = "green";
        break;
    case "shipped":
        $color = "blue";
        break;
    case "delivered":
        $color = "black";
        break;
    case "canceled":
        $color = "red";
    default:
        $status = "standby";
        $color = "orange";
}


$color = match ($status) {
    "standby" => "orange",
    "validated" => "green",
    "shipped" => "blue",
    "delivered" => "black",
    "canceled" => "red",
    default => "orange",
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <span style="color: <?= $color ?>">⏳ Commande en attente de validation</span>
</body>

</html>