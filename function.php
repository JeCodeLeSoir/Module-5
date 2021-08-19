<?php
require_once __DIR__ . '/login.php';
require_once __DIR__ . '/menu.php';


function HelloWorld(){
    return "Hello World!";
}

echo HelloWorld() . "<br><br>";

function jeRetourneMonArgument($arg){
    
    if($arg == "abc"){
        return "abc";
    }

    if($arg == "123"){
        return "123";
    }
}

echo jeRetourneMonArgument("123") . "<br><br>";

function concatenation($a, $b){
    return $a . $b;
}

echo concatenation("Antoine", "Griezmann") . "<br><br>";


function somme($a, $b ){
    return $a + $b;
}

echo somme(5, 5) . "<br><br>";

function soustraction($a, $b ){
    return $a - $b;
}

echo soustraction(5, 5) . "<br><br>";


function multiplication($a, $b ){
    return $a * $b;
}

echo multiplication(5, 5) . "<br><br>";

function division($a, $b ){
    return $a / $b;
}

echo division(5, 5) . "<br><br>";


function estIlMajeure($age){
   return $age >= 18;
}

var_dump(estIlMajeure(5));
echo "<br><br>";
var_dump(estIlMajeure(34));
echo "<br><br>";


function premierElementTableau($array){
  if(!isset($array))
    return null;

  return $array[0];
}

var_dump(premierElementTableau(null));
echo "<br><br>";
echo premierElementTableau([1, 2 , 3]) . "<br><br>";


function plusGrand($array)
{ 
    if(!isset($array))
        return null;

    $p = 0;
    for ($i = 0; $i < count($array); $i++) {
        if($array[$i] > $p){
            $p = $array[$i];
        }
    }
    return $p;
}

var_dump(plusGrand(null));
echo "<br><br>";
echo plusGrand([1, 8 , 3, 4]) . "<br><br>";


function verificationPassword($pass){
    return strlen($pass) >= 8;
}

var_dump(verificationPassword("azerty"));
echo "<br><br>";



    
function capital($pays){


    $array = [
        'France' => 'Paris',
        'Allemagne' => 'Berlin',
        'Italie' => 'Rome',
        'Maroc' => 'Rabat',
        'Espagne' => 'Madrid',
        'Portugal' => 'Lisbonne',
        'Angleterre' => 'London',
        'Tout autre pays' => 'Inconnu'
    ];

    foreach ($array as $key => $value) {
        if (strtolower($key) == strtolower($pays)) {
            return $value;
        }
    }

    return $array['Tout autre pays'];
}

var_dump(capital("Italie"));
echo "<br><br>";

var_dump(capital("xx"));
echo "<br><br>";


function listHTML($title, $array){
    echo "<h3>".$title."</h3>";
    echo "<ul>";
        foreach ($array as $key => $value) {
            echo '<li id="'.$key.'">'.$value.'</li>';
        }
    echo "</ul>";
}

echo  listHTML("Capitale", ["Paris", "Berlin", "Moscou"]) . "<br><br>";


function remplacerLesLettres($a){
    $a = str_replace('e', '3', $a);
    $a = str_replace('i', '1', $a);
    $a = str_replace('o', '0', $a);

    return $a;
}

echo  remplacerLesLettres("Bonjour les amis") . "<br><br>";


function quelleDate(){
    return date("d/m/y");
}

echo  quelleDate() . "<br><br>";