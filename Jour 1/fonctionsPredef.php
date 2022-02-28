<?php

//Fonctions de manipulation de string

$chaine = 'Les joueurs pro de rugby sont les meilleurs joueurs de sport';

//str_replace sert à remplasser une occurence dans une chaine de caractères
$chaine2 = str_replace('rugby', 'foot', $chaine);
// var_dump($chaine2);


//explode permet de diviser une chaine de caractères en fonction d'une occurence et de placer chaque partie dans un tableau
$tableau = explode(' ', $chaine);
// var_dump($tableau);



//Fonctions des tableaux
//in_array retourne true si l'element est present dans le tableau, sinon false
if (in_array('rugby', $tableau)) {
    //echo 'Youhou';
}

//array_search retourne l'index du premier élément correspondant
//echo array_search('rugby', $tableau);


//Fonctions mathématiques

//la fonction rand permet de générer un nombre aléatoire en x et X
rand(0, 100);

//sqrt retourne la racine carrée d'un nombre
$sqrt = sqrt(500);

//round retourn l'arrondi du nombre décimal passé en paramètre
echo round($sqrt, 2);