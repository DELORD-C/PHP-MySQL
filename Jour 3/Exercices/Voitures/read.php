<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des voitures</title>
</head>
<body>
    <?php

    if (!isset($_GET['id'])) {
        header('location: list.php');
    }

    include('../../../Jour 2/BDD/connect.php');
    $requete = $bdd->prepare("SELECT * FROM voiture WHERE id = :id");
    $requete->execute(['id' => $_GET['id']]);
    $voiture = $requete->fetch();
    ?>
    <div>
        <h2><?=$voiture['marque']?></h2>
        <h3><?=$voiture['modele']?> - <?=$voiture['version']?></h3>
        <p>Puissance : <?=$voiture['puissance']?> ch</p>
        <p>Nombre de portes : <?=$voiture['nbportes']?></p>
        <p>Prix neuf : <?=$voiture['prix']?> €</p>
        <img style="width: 200px;" src="upload/<?=$voiture['image']?>"><br>
    </div>
    <a href='list.php'>Retour</a>
</body>
</html>