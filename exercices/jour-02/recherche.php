<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$category = ["Vêtements", "Chaussures", "Accessoires", "Sport"];
$wordToFind1 = "Chaussures";
$wordToFind2 = "Électronique";

?>

<pre>
<?php
if (in_array($wordToFind1, $category)) {
    echo $wordToFind1 . " Find";
} else {
    echo $wordToFind1 . " not in category";
}
?>
<br>
<?php
if (in_array($wordToFind2, $category)) {
    echo $wordToFind2 . " Find";
} else {
    echo $wordToFind2 . " not in category";
}
?>
<br>
<?php
echo array_search("Sport", $category);
?>

</pre>