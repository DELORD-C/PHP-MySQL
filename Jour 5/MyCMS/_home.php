<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>
<body>
    <h1>Bienvenue sur MyCMS</h1>
    <h2>Liste des pages</h2>
    <ul>
        <?php
            include('admin/_bdd.php');
            $pages = getPages($bdd);
            foreach ($pages as $page) { ?>
                <li><a href='?page=<?=$page['id']?>'><?=$page['nom']?></a></li>
            <?php }
        ?>
    </ul>
    <h2>Liste des auteurs</h2>
    <ul>
        <?php
            $requete = $bdd->prepare("SELECT id, nom FROM utilisateur");
            $requete->execute();
            $auteurs = $requete->fetchAll();
            foreach ($auteurs as $auteur) { ?>
                <li><a href='?auteur=<?=$auteur['id']?>'><?=$auteur['nom']?></a></li>
            <?php }
        ?>
    </ul>
    <a href='admin.php'>Backoffice</a>
</body>
</html>