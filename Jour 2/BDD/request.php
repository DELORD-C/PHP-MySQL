<?php

include('connect.php');

$requete = $bdd->prepare("SELECT * FROM film");
$requete->execute();
$resultats = $requete->fetchAll();

echo '<pre>';
var_dump($resultats);
echo '</pre>';