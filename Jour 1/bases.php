<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Les variables

//initialiser une variable avec une valeur
$a = 10;
$c = 5;
$string = "Bonjour";

//initialiser une variable sans valeur
$b;

//la commande var_dump() permet d'afficher le type et le contenu d'une variable passée en paramètre
//var_dump($a);


//réaffecter une valeur à une variable
$a = 20;


//opérations avec des variables
$d = $a + $c;
// $test = $a + $string;        On ne peut pas ajouter une string et un int


//Liste des types de données
// Chaines de caractères        String
// Entiers                      Integers | Int
// Tableaux                     Array
// Décimaux                     Float
// Booléens                     Boolean | Int
// Object                       Obj
// NULL                         Null

//Liste des opérateurs
// +        Addition
// -        Soustraction
// *        Multiplication
// /        Soustraction
// %        Modulo




//Les conditions

//Opérateurs de condition
// ==       Egal
// !=       Différent
// >        Supérieur
// >=       Supérieur ou égal
// <        Inférieur
// <=       Inférieur ou égal
// ||       Ou      Or
// &&       Et      And

//SI        IF
if ($a > 10 && $b < 10) {
    //actions à effectuer si vrai
}
//else facultatif
else if ($b =! NULL) {
    //actions à effectuer si vrai
}
else {
    //actions si toutes les conditions sont fauses
}



//Switch
switch ($a) {
    case 10:
        //actions à effectuer si $a est égal à 10
        break;

    case 20:
        //actions à effectuer si $a est égal à 20
        break;
    
    //default facultatif
    default:
        //actions à effectuer dans tous les autres cas
        break;
}

//Les tableaux       Array
//définition d'un tableaux literal
//On peut définir un index avec un nombre ou une string
$tab = [64 => 54, 'Nombre' => 67, 94, 'String', true];

//faire référence / redéfinir un élement avec son index
$tab[64] = 55;

//définir une valeur à la volée
$tab['index'] = 78;

//var_dump($tab);

//définition d'un tableau vide
$tab2 = [];
$tab2 = array(); // équivalent

//ajouter un élément à un tableau avec array_push($tableau, $element)
array_push($tab2, 'Element1', 'Element2');
//var_dump($tab2);



//Les boucles

//do while
$a = 1;
do {
    //actions à effectuer tant que la condition while est respectée

    //echo $a;
    //echo '<br>';

    $a++; //incrémentation de 1
    //équivalent à : $a = $a + 1;
} while ($a <= 10);

//for
for ($i = 1; $i <= 10; $i++) { 
    //actions à effectuer tant que la condition du for est respectée
    //echo $i;
    //echo '<br>';
}

//foreach           Pour chaque élément d'un tableau
foreach ($tab as $key => $value) {
    // echo $key;
    // echo ' => ';
    // echo $value;
    // echo '<br>';
}

foreach ($tab as $value) { //ecriture si on a pas besoin de l'index
    //echo $value;
}


//on peut sauter des lignes pour une meilleur visibilité
$fruits = [
    'Banane',
    'Pomme',
    'Clémentine',
    'Pèche',
    'Fraise',
    'Prune',
    'Cerise',
    'Ananas',
    'Framboise',
    'Mangue'
];

//sort permet de trier alphabétiquement un tableau
sort($fruits);



// Les constantes
// Fonctionnent comme les variables sauf que leur valeur ne peut pas être modifiée
define("CONSTANTE", 'valeur');

echo CONSTANTE;