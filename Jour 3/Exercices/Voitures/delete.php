<?php

if (isset($_GET['delete']) && isset($_GET['id'])) {
    include('../../../Jour 2/BDD/connect.php');
    $requete = $bdd->prepare('DELETE FROM voiture WHERE id = :id;');
    $requete->execute([
        'id' => $_GET['id']
    ]);
}

header('location: list.php');