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
    include('../../../Jour 2/BDD/connect.php');
    $requete = $bdd->prepare("SELECT * FROM voiture");
    $requete->execute();
    $voitures = $requete->fetchAll();
    foreach ($voitures as $voiture) { ?>
        <div>
            <h2><?=$voiture['marque']?></h2>
            <h3><?=$voiture['modele']?> - <?=$voiture['version']?></h3>
            <p>Puissance : <?=$voiture['puissance']?> ch</p>
            <p>Nombre de portes : <?=$voiture['nbportes']?></p>
            <p>Prix neuf : <?=$voiture['prix']?> €</p>
            <img style="width: 200px;" src="upload/<?=$voiture['image']?>"><br>
            <a href='read.php?id=<?=$voiture['id']?>'>Voir</a>
            <a href='update.php?id=<?=$voiture['id']?>'>Editer</a>
            <a href='delete.php?id=<?=$voiture['id']?>&delete=true'>Supprimer</a>
        </div>
        <hr>
    <?php } ?>
    <a href='create.php'>Insérer un nouveau voiture</a>
</body>
</html>