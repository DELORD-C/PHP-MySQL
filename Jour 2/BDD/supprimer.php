<?php

if (isset($_GET['delete']) && isset($_GET['id'])) {
    include('connect.php');
    $requete = $bdd->prepare('DELETE FROM film WHERE id = :id;');
    $requete->execute([
        'id' => $_GET['id']
    ]);

    header('location: list.php');
}

include('connect.php');

