<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//$password = file_get_contents('password.secret');

//file_get_contents récupère le contenu de notre fichier en string
$json = file_get_contents(__DIR__ . '/env.json');

//json_decode transforme notre string en objet
$data = json_decode($json);

// echo '<pre>';
// var_dump($data);
// echo '</pre>';

//l'objet PDO sert à se connecter à la base de donnée, on lui passe les différents attributs de notre objet $data
$bdd = new PDO($data->type . ':host=' . $data->hote . ';dbname=' . $data->dbname, $data->utilisateur, $data->pass);
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

function dump($a) {
    echo '<pre>';
    var_dump($a);
    echo '</pre>';
}