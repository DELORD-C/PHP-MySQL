<?php

// Créer une boucle qui affiche les 15 premiers éléments de la suite de fibonacci

$num1 = 0;
$num2 = 1;

for ($i=0; $i < 15; $i++) {
    $temp = $num1 + $num2;
    $num1 = $num2;
    $num2 = $temp;
    echo $num2;
    echo '<br>';
}