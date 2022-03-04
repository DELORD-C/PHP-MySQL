<?php
    include('admin/_bdd.php');
    
    $auteur = getUserById($_GET['auteur'], $bdd);
    
    $requete = $bdd->prepare("SELECT id, nom FROM page WHERE auteur = :id");
    $requete->execute(['id' => $_GET['auteur']]);
    $pages = $requete->fetchAll();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des pages créées par <?=$auteur['nom']?></title>
</head>
<body>
    <h2>Liste des pages crées par <?=$auteur['nom']?></h2>
    <ul>
        <?php
            
            foreach ($pages as $page) { ?>
                <li><a href='?page=<?=$page['id']?>'><?=$page['nom']?></a></li>
            <?php }
        ?>
    </ul>
    <a href='.'>Retour</a>
</body>
</html>