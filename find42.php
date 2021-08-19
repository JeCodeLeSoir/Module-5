<?php
require_once __DIR__ . '/login.php';
require_once __DIR__ . '/menu.php';


$nums = [];

for ($i=0; $i< 10; $i++) {
    $nums [] = rand(0, 100);
}

print_r($nums);

if(in_array(42, $nums)){
    echo '<h1>42 à était trouvé !</h1>';
}
else{
    echo '<h1>pas trouvé 42 !</h1>';
}

?>