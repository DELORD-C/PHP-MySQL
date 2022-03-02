<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des films</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Résumé</th>
                <th>Note</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            <?php
            include('connect.php');
            $requete = $bdd->prepare("SELECT * FROM film");
            $requete->execute();
            $films = $requete->fetchAll();
            foreach ($films as $film) { ?>
                <tr>
                    <!-- balide d'affichage php correspond à la balide basique suivie d'un echo -->
                    <td><?=$film['nom']?></td>
                    <td><?=$film['resume']?></td>
                    <td><?=$film['note']?></td>
                    <td>
                        <a href='film.php?id=<?=$film['id']?>'>Voir</a>
                        <a href='film.php?id=<?=$film['id']?>&delete=true'>Supprimer</a>
                    </td>
                </tr>
            <?php } ?>

        </tbody>
    </table>
    <a href='film.php'>Insérer un nouveau film</a>
</body>
</html>