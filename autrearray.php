<?php
require_once __DIR__ . '/login.php';
require_once __DIR__ . '/menu.php';

//population pays

echo "En utilisant le tableau ci-dessous, compter le nombre d'éléments du tableau.<br>";

$pays_population = [
    'France' => 67595000,
    'Suede' => 9998000,
    'Suisse' => 8417000,
    'Kosovo' => 1820631,
    'Malte' => 434403,
    'Mexique' => 122273500,
    'Allemagne' => 82800000,
];

echo '<pre>';
print_r($pays_population);
echo '<pre><br>';

echo 'count ' . count($pays_population);

echo '<br><br>';

echo "Donnez la syntaxe qui permet d'afficher le deuxième élément du tableau cocktails ?<br>";
 
$cocktails = ['Mojito', 'Long Island Iced Tea', 'Gin Fizz', 'Moscow mule'];

echo '<pre>';
print_r($cocktails);
echo '<pre><br>';

echo $cocktails[1]."<br>";