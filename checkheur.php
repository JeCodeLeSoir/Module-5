<?php
require_once __DIR__ . '/login.php';
require_once __DIR__ . '/menu.php';


if (isset($_POST['heur'])) {
    $heur = $_POST['heur'];
    
    if ($heur <= 12) {
        echo "matin";
    } 
    elseif ($heur >= 12 && $heur <= 18) {
        echo "aprè midi";
    }
    elseif ($heur >= 18 && $heur <= 24) {
        echo "la nuit";
    } 
}
?>

<form method="POST">
    <input type="text" name="heur" value="6">
    <input type="submit" value ="Calculer">
</form>