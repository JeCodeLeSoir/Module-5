<?php
require_once __DIR__ . '/login.php';
require_once __DIR__ . '/menu.php';


if(isset($_POST['age'])){

    $age = intval($_POST['age']);

    echo $age." ans ==> ";

    if ($age >= 18) {
        echo "majeur !<br>";
    }
    else if($age < 18){
        echo "mineur !<br>";
    }
    
}
?>

<form method="POST">
    <input type="number" name="age" value="16">
    <input type="submit" value ="Calculer">
</form>