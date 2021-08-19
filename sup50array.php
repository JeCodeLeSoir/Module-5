<?php
require_once __DIR__ . '/login.php';
require_once __DIR__ . '/menu.php';


$nums = [];

for ($i=0; $i< 10; $i++) {
    $nums [] = rand(0, 100);
}


$numsSup50 = [];
$numsInf50 = [];

for ($i=0; $i< 10; $i++) {
    if($nums[$i] > 50){
        $numsSup50[] = $nums[$i];
    }
    if($nums[$i] <= 50){
        $numsInf50[] = $nums[$i];
    }
}

echo 'Sup<br>';

echo '<pre>';
print_r($numsSup50);
echo '</pre>';

echo 'Inf<br>';

echo '<pre>';
print_r($numsInf50);
echo '</pre>';