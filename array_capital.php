<?php
require_once __DIR__ . '/login.php';
require_once __DIR__ . '/menu.php';

$array = ['France' => 'Paris', 'Allemagne' => 'Berlin', 'Italie' => 'Rome'];

foreach ($array as $key => $value) {
    echo "la capital du pays " . $key  . " et ". $value . '<br>';
}


?>