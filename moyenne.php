<?php
require_once __DIR__ . '/login.php';


require_once __DIR__ . '/menu.php';

if(isset($_POST['notes'])){
    $notes = explode(",", $_POST['notes']);

    $moyenne = 0;

    for ($i = 0; $i < count($notes); $i++) {
        $notes[$i] = intval($notes[$i]);
        $moyenne += $notes[$i];
    }

    $moyenne = $moyenne / count($notes);
    
    echo "La moyenne est de ".$moyenne."/20.\n";
}

?>

<form method="POST">
    <input type="text" name="notes" value="15, 12, 9">
    <input type="submit" value ="Calculer">
</form>