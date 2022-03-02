<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un bloc</title>
</head>

<?php

include('../bdd.php');

if (isset($_POST['nom'])) {

    $requete = $bdd->prepare("INSERT INTO page (nom, contenu, auteur)
    VALUES (:nom, :contenu, :auteur)");

    session_start();

    $requete->execute([
        'nom' => $_POST['nom'],
        'contenu' => $_POST['contenu'],
        'auteur' => $_SESSION['id']
    ]);
}

?>

<body>
    <form method="POST">
        <input type="text" name="nom" placeholder="Nom"><br/>
        <textarea name="contenu" placeholder='Contenu HTML'></textarea>
        <p>Insérez des blocs ci-dessus en utilisant la syntaxe suivantes :</p>
        <p>{bloc:[ID DU BLOC]}</p>
        <input type="submit">
    </form>
    <a href='list.php'>Retour</a>
</body>
</html>