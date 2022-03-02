<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insérer un film</title>
</head>

<?php

include('../../../Jour 2/BDD/connect.php');

foreach ($_POST as $key => $value) {
    $_POST[$key] = htmlspecialchars($value);
}

if (isset($_POST['marque']) && !empty($_FILES) && $_FILES['image']['size'] > 0) {

    $filename = time() . '-' . $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], 'upload/' . $filename);

    $requete = $bdd->prepare("INSERT INTO voiture (marque, modele, version, puissance, nbportes, prix, image)
    VALUES (:marque, :modele, :version, :puissance, :nbportes, :prix, :image)");

    $requete->execute([
        'marque' => $_POST['marque'],
        'modele' => $_POST['modele'],
        'version' => $_POST['version'],
        'puissance' => $_POST['puissance'],
        'nbportes' => $_POST['nbportes'],
        'prix' => $_POST['prix'],
        'image' => $filename
    ]);
}

?>

<body>
    <form method="POST" enctype="multipart/form-data">
        <input type="text" name='marque' placeholder="Marque"><br/>
        <input type="text" name='modele' placeholder="Modele"><br/>
        <input type="text" name='version' placeholder="Version"><br/>
        <input type="number" name='puissance' placeholder="Puissance"><br/>
        <input type="number" name='nbportes' placeholder="Nombre de portes"><br/>
        <input type="number" name='prix' placeholder="Prix"><br/>
        <input type="file" name='image'><br/>
        <input type="submit" value="Ajouter">
    </form>
    <a href='list.php'>Retour</a>
</body>
</html>