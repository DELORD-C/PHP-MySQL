<?php include('../../_auth.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un bloc</title>
</head>

<?php

include('../_bdd.php');

if (isset($_POST['nom'])) {

    $requete = $bdd->prepare("INSERT INTO bloc (nom, contenu)
    VALUES (:nom, :contenu)");

    $requete->execute([
        'nom' => $_POST['nom'],
        'contenu' => $_POST['contenu']
    ]);
}

?>

<body>
    <form method="POST">
        <input type="text" name="nom" placeholder="Nom">
        <textarea name="contenu" placeholder='Contenu HTML'></textarea>
        <input type="submit">
    </form>
    <a href='list.php'>Retour</a>
</body>
</html>