<?php

if (!isset($_GET['id'])) {
    header('location: list.php');
}

include('connect.php');


//DEBUT BLOC UPDATE
foreach ($_POST as $key => $value) {
    $_POST[$key] = htmlspecialchars($value);
}
if (isset($_POST['nom'])) {
    $requete = $bdd->prepare("UPDATE film SET nom = :nom, resume = :resume, note = :note WHERE id = :id");

    $requete->execute([
        'nom' => $_POST['nom'],
        'resume' => $_POST['resume'],
        'note' => $_POST['note'],
        'id' => $_GET['id']
    ]);
}
//FIN BLOC UPDATE


//DEBUT BLOC SELECT
$query = $bdd->prepare('SELECT * FROM film WHERE id = :id');
$query->execute([
    'id' => $_GET['id']
]);
$film = $query->fetch();
//FIN BLOC SELECT

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <input type="text" name='nom' placeholder="Nom" value="<?=$film['nom']?>"><br/>
        <input type="number" min='0' max='5' name='note' placeholder="Note" value="<?=$film['note']?>"><br/>
        <textarea name="resume" placeholder="Résumé"><?=$film['resume']?></textarea><br/>
        <input type="submit" value="Ajouter">
    </form>
    <a href='list.php'>Retour</a>
</body>
</html>