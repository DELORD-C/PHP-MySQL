<?php include('../../_auth.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des blocs</title>
</head>
<body>
    <?php
    include('../_bdd.php');
    $requete = $bdd->prepare("SELECT * FROM bloc");
    $requete->execute();
    $blocs = $requete->fetchAll();
    foreach ($blocs as $bloc) { ?>
        <div>
            <h2><?=$bloc['nom']?></h2>
            <p><?=htmlspecialchars($bloc['contenu'])?></p>
            <p>Code du bloc : <?=$bloc['id']?></p>
            <a href='update.php?id=<?=$bloc['id']?>'>Editer</a>
            <?php if ($bloc['id'] != 1 && $bloc['id'] != 2) { ?>
                <a href='delete.php?id=<?=$bloc['id']?>&delete=true'>Supprimer</a>
            <?php } ?>
        </div>
        <hr>
    <?php } ?>
    <a href='create.php'>Insérer un nouveau bloc</a>
    <a href='../../admin.php'>Retour</a>
</body>
</html>