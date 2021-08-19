<?php
require_once __DIR__ . '/login.php';
require_once __DIR__ . '/menu.php';


if (isset($_POST['budjet']) && isset($_POST['achats'])) {
    
    $budjet = $_POST['budjet'];
    $achats = $_POST['achats'];

    $budjet = str_replace('€', '', $budjet);
    $achats = str_replace('€', '', $achats);

    $budjet = str_replace(',', '.', $budjet);
    $achats = str_replace(',', '.', $achats);

    $budjet = floatval($budjet);
    $achats = floatval($achats);

    $difference = $budjet - $achats;
    
    if($difference < 0)
        echo "il manque ".abs($difference)."€ <br>";
    else if($difference > 0)
        echo "il rest ".abs($difference)."€ <br>";
}
?>

<form method="POST">
    <input type="text" name="budjet" value="553,89€">
    <input type="text" name="achats" value="1554,76€">

    <input type="submit" value ="Calculer">
</form>