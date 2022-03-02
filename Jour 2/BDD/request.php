<?php

include('connect.php');

$requete = $bdd->prepare("SELECT * FROM film");
$requete->execute();
//fetchAll sert à analyser et transformer les données retournées en données exploitables
$resultats = $requete->fetchAll();

echo '<pre>';
var_dump($resultats);
echo '</pre>';