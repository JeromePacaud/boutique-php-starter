<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$grocerie = ["banane", "poulet", "chocolat", "poisson", "carotte"];
$arrayLen = count($grocerie);

?>

<pre>
<?php
var_dump(
    $grocerie[0],
    $grocerie[$arrayLen - 1],
    $arrayLen,
);

echo "\n";

array_push($grocerie, "lait", "cacao");

var_dump(
    $grocerie,
);

echo "\n";

// unset($grocerie[2]);
array_splice($grocerie, 2, 1);

var_dump(
    $grocerie,
);

?>
</pre>