<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$json = file_get_contents(__DIR__ . '/env.json');

$data = json_decode($json);

$bdd = new PDO($data->type . ':host=' . $data->hote . ';dbname=' . $data->dbname, $data->utilisateur, $data->pass);
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

function dump($a) {
    echo '<pre>';
    var_dump($a);
    echo '</pre>';
}

function getUserById($id, $bdd) {
    $requete = $bdd->prepare("SELECT * FROM utilisateur WHERE id = :id");
    $requete->execute(['id' => $id]);
    return $requete->fetch();
}

function getPages($bdd) {
    $requete = $bdd->prepare("SELECT * FROM page");
    $requete->execute();
    return $requete->fetchAll();
}