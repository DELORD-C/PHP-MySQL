<?php include('../../_auth.php');

if (isset($_GET['delete']) && isset($_GET['id']) && $_GET['id'] != 1 && $_GET['id'] != 2) {
    include('../_bdd.php');
    $requete = $bdd->prepare('DELETE FROM bloc WHERE id = :id;');
    $requete->execute([
        'id' => $_GET['id']
    ]);
}

header('location: list.php');