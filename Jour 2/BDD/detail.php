<?php

if (!isset($_GET['id'])) {
    header('location: list.php');
}

include('connect.php');
$query = $bdd->prepare('SELECT * FROM film WHERE id = :id');
$query->execute([
    'id' => $_GET['id']
]);
$film = $query->fetch();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$film['nom']?> - Détails</title>
</head>
<body>
    <h2>Nom du film</h2>
    <p><?=$film['nom']?></p>
    <br/>
    <br/>
    <h3>Résumé du film</h3>
    <p><?=$film['resume']?></p>
    <br/>
    <p>Note : <?=$film['note']?></p>
    <br/>
    <br/>
    <a href='list.php'>Retour</a>
</body>
</html>