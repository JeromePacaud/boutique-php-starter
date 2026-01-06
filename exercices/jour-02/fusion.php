<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


$clothes = ["T-shirt", "Jean", "Pull"];
$accessories = ["Ceinture", "Montre", "Lunettes"];

$catalogue = array_merge($clothes, $accessories);

array_unshift($catalogue, "Chaussure");
?>

<pre>
<?php

var_dump(
    $catalogue,
);


echo "\nLe tableau catalogue contient " . count($catalogue) . " élement\n";
?>

</pre>