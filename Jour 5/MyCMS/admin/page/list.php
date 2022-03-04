<?php include('../../_auth.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des pages</title>
</head>
<body>
    <?php
    include('../_bdd.php');
    $pages = getPages();
    foreach ($pages as $page) { 
        $auteur = getUserById($page['auteur'])['nom'];
        ?>
        <div>
            <h2><?=$page['nom']?></h2>
            <p><?=htmlspecialchars($page['contenu'])?></p>
            <p>Auteur : <?=$auteur?></p>
            <a href='update.php?id=<?=$page['id']?>'>Editer</a>
            <a href='delete.php?id=<?=$page['id']?>&delete=true'>Supprimer</a>
        </div>
        <hr>
    <?php } ?>
    <a href='create.php'>Insérer une nouvelle page</a>
    <a href='../../admin.php'>Retour</a>
</body>
</html>