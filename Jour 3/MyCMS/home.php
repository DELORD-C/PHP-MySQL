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
    <ul>
        <?php
            include('admin/bdd.php');
            $requete = $bdd->prepare("SELECT id, nom FROM page");
            $requete->execute();
            $pages = $requete->fetchAll();
            foreach ($pages as $page) { ?>
                <li><a href='?page=<?=$page['id']?>'><?=$page['nom']?></a></li>
            <?php }
        ?>
    </ul>
    <a href='admin.php'>Backoffice</a>
</body>
</html>