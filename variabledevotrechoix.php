<?php
require_once __DIR__ . '/login.php';
require_once __DIR__ . '/menu.php';

echo "v1<br>";

for($i=0; $i<=20; $i+=2){
    if ($i == 10) {
        echo "<h1>".$i."</h1>";
    } else {
        echo $i."<br>";
    }
}

echo "<br>";
echo "v2<br>";
$i = 0;
while($i <= 20){
    if ($i == 10) {
        echo "<h1>".$i."</h1>";
    }
    else {
        echo $i."<br>";
    }
    $i += 2;
}

echo "<br>";
echo "v3<br>";
$i = 0;

a:
    if ($i == 10) {
        echo "<h1>".$i."</h1>";
    } else {
        echo $i."<br>";
    }

    $i += 2;

    if ($i <= 20) {
        goto a;
    }


echo "<br>";
echo "v4<br>";

$i = 0;
$v = function ($i, $v ) { if ($i == 10) { echo "<h1>".$i."</h1>"; } else {echo $i."<br>";} $i+= 2;if ($i <= 20) {call_user_func_array($v, [$i, $v]); }}; $v($i, $v);
    

?>