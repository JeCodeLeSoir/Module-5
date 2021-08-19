<?php
require_once __DIR__ . '/login.php';
require_once __DIR__ . '/menu.php';

$test = 42;
var_dump($test);

echo "<br>";

$sexe = "M";
if($sexe == "M" ){
    echo "Homme<br>";
}
else if ($sexe == "F"){
    echo "Femme<br>";
}

?>