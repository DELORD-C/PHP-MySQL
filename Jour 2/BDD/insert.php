<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insérer un film</title>
</head>

<?php

//VERIFICATION ET SANITIZATION DE NOS PARAMETRE POST
foreach ($_POST as $key => $value) {
    //la fonction htmlspecialchars permet de remplacer les charactères spéciaux par leur code html
    $_POST[$key] = htmlspecialchars($value);
}

//on vérifie que la variable $_POST['nom'] existe
if (isset($_POST['nom'])) {
    //on include notre script de connexion à la bdd
    include('connect.php');
    //on prepare notre requete avec les pseudo variables
    $requete = $bdd->prepare("INSERT INTO film (nom, resume, note) VALUES (:nom, :resume, :note)");

    //on passe en argument à  notre fonction execute, un tableau associatif des parametres
    $requete->execute([
        'nom' => $_POST['nom'],
        'resume' => $_POST['resume'],
        'note' => $_POST['note']
    ]);
}

?>

<body>
    <form method="POST">
        <input type="text" name='nom' placeholder="Nom"><br/>
        <input type="number" min='0' max='5' name='note' placeholder="Note"><br/>
        <textarea name="resume" placeholder="Résumé"></textarea><br/>
        <input type="submit" value="Ajouter">
    </form>
    <a href='list.php'>Retour</a>
</body>
</html>