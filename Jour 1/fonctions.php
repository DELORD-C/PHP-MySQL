<?php

//definir une fonction
function dump ($param) {
    echo '<pre>';
    var_dump($param);
    echo '</pre>';
}

//dump($_SERVER);

//une fonction sert à factoriser du code, et simplifier l'utilisation et la compréhension d'un script

function direBonjour (string $denomination, string $nom, string $prenom) {
    echo 'Bonjour, ' . $denomination . ' ' . $nom . ' ' . $prenom . '.<br>';
}

//direBonjour('Mr.', 'WASHINGTON', 'Georges');
//direBonjour('Mme', 'HOLIDAY', 'Billie');

function fibonacci (int $nb) {
    $num1 = 0;
    $num2 = 1;
    
    for ($i=0; $i < $nb; $i++) {
        $temp = $num1 + $num2;
        $num1 = $num2;
        $num2 = $temp;
        echo $num2;
        echo '<br>';
    }
}

// fibonacci(30);

//fonction avec retour
function isPair(int $nb) {
    if ($nb%2 == 0) {
        return true;
    }
    return false;
}

// dump(isPair(8));

function displayErrors () {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}