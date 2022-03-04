<?php include('../../_auth.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php

    if (!isset($_GET['id'])) {
        header('location: list.php');
    }

    include('../_bdd.php');

    if (isset($_POST['nom'])) {

        $requete = $bdd->prepare("UPDATE page SET nom = :nom, contenu = :contenu WHERE id = :id");

        $requete->execute([
            'nom' => $_POST['nom'],
            'contenu' => $_POST['contenu'],
            'id' => $_GET['id']
        ]);
    }

    $requete = $bdd->prepare("SELECT * FROM page WHERE id = :id");
    $requete->execute(['id' => $_GET['id']]);
    $page = $requete->fetch();
    ?>
    <title>Editer page - <?=$page['nom']?></title>
</head>
<body>
    <form method="POST">
        <input type="text" name='nom' placeholder="Nom" value="<?=$page['nom']?>"><br/>
        <textarea type="text" name='contenu' placeholder="Contenu HTML"><?=htmlspecialchars($bloc['contenu'])?></textarea><br/>
        <input type="submit" value="Modifier">
    </form>
    <a href='list.php'>Retour</a>
</body>
</html>