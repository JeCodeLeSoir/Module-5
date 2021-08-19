<?php
require_once __DIR__ . '/login.php';
require_once __DIR__ . '/menu.php';

for($i = 0; $i < 11; $i++) {
    echo $i." * 5 = " . ($i * 5) . "<br>";
}

echo "<br>";

for(
    $i = 11; 
    0 < $i; 
    $i--
) {
    echo $i." * 5 = " . ($i * 5) . "<br>";
}


?>