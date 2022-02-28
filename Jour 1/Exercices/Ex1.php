<?php

//Initialiser un tableau
$fruits = [
    'Banane',
    'Pomme',
    'Clémentine',
    'Fraise',
    'Prune',
    'Cerise',
    'Ananas',
    'Framboise',
    'Mangue'
];

$numbers = [18, 5, 67, 90, 1, 23, 76];

// Trier le tableau par ordre alphabétique sans utiliser de fonction php de tri automatique
// (en utilisant les boucles)

// la fonction strcmp($str1, $str2)

for ($i = 0; $i < count($numbers); $i++) { //18
    for ($j = $i + 1; $j < count($numbers); $j++) {//5
        if ($numbers[$i] > $numbers[$j]) {
            $temp = $numbers[$i];
            $numbers[$i] = $numbers[$j];
            $numbers[$j] = $temp;
        }
    }
}

for ($i = 0; $i < count($fruits); $i++) { //18
    for ($j = $i + 1; $j < count($fruits); $j++) {//5
        if (strcmp($fruits[$i], $fruits[$j]) > 0) { //la fonction strcmp retourne un nombre positif si le premier element est classé plus loin que le deuxième élement (alphabétiquement)
            $temp = $fruits[$i];
            $fruits[$i] = $fruits[$j];
            $fruits[$j] = $temp;
        }
    }
}

var_dump($fruits);