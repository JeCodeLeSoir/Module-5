<?php
require_once __DIR__ . '/login.php';

require_once __DIR__ . '/menu.php';


if (isset($_POST['prix_ht']) && isset($_POST['tva'])) {
    
    $prix_ht = $_POST['prix_ht'];
    $tva = $_POST['tva'];
    
    $prix_ttc = $prix_ht + ($prix_ht * $tva / 100);

    echo "Le prix TTC du produit est de ".$prix_ttc." €<br>";
}

?>

<form method="POST">
    <input type="text" name="prix_ht" value="50" placeholder="prix ht">
    <input type="text" name="tva" value="20" placeholder="tva">

    <input type="submit" value ="Calculer">
</form>