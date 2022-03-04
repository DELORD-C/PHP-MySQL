<?php


//Lire un fichier ligne par ligne
$file = fopen('Exercice 11.md', 'r');
// fgets permet de récupérer le contenu de la ligne actuelle
// et de placer le pointeur sur la prochaine (si le pointeur était en début de ligne, sinon il récupère le reste de la ligne)
fgets($file, 2);
echo fgets($file);
echo fgets($file);



//Redimensionner une image
$img = imagecreatefrompng('img.png'); //on récupère notre image de base te on en fait un objet GD
$newimg = imagescale($img, 256, 256); //on créé une nouvelle image redimensionné
imagepng($newimg, 'newimg.png'); //on sauvegarde l'image dans un fichier désiré