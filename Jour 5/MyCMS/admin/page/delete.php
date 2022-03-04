<?php include('../../_auth.php');

if (isset($_GET['delete']) && isset($_GET['id'])) {
    include('../_bdd.php');
    $requete = $bdd->prepare('DELETE FROM bloc WHERE id = :id;');
    $requete->execute([
        'id' => $_GET['id']
    ]);
}

header('location: list.php');