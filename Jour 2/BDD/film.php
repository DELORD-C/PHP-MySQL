<?php

include('connect.php');

if (isset($_GET['delete']) && isset($_GET['id'])) {
    $requete = $bdd->prepare('DELETE FROM film WHERE id = :id;');
    $requete->execute([
        'id' => $_GET['id']
    ]);

    header('location: list.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php
    foreach ($_POST as $key => $value) {
        $_POST[$key] = htmlspecialchars($value);
    }
    if (!isset($_GET['id'])) {
        echo "<title>Insérer un film</title>";
        if (isset($_POST['nom'])) {
            $requete = $bdd->prepare("INSERT INTO film (nom, resume, note) VALUES (:nom, :resume, :note)");
            $requete->execute([
                'nom' => $_POST['nom'],
                'resume' => $_POST['resume'],
                'note' => $_POST['note']
            ]);
        }
    }
    else {
        if (isset($_POST['nom'])) {
            $requete = $bdd->prepare("UPDATE film SET nom = :nom, resume = :resume, note = :note WHERE id = :id");
        
            $requete->execute([
                'nom' => $_POST['nom'],
                'resume' => $_POST['resume'],
                'note' => $_POST['note'],
                'id' => $_GET['id']
            ]);
        }
        
        $query = $bdd->prepare('SELECT * FROM film WHERE id = :id');
        $query->execute([
            'id' => $_GET['id']
        ]);
        $film = $query->fetch();

        echo "<title>" . $film['nom'] . " - Détails</title>";
    }
?>
    
</head>

<body>
    <form method="POST">
    
        <?php if (!isset($_GET['id'])) { ?>
            <input type="text" name='nom' placeholder="Nom"><br/>
            <input type="number" min='0' max='5' name='note' placeholder="Note"><br/>
            <textarea name="resume" placeholder="Résumé"></textarea><br/>
            <input type="submit" value="Ajouter">
        <?php } else { ?>
            <input type="text" name='nom' placeholder="Nom" value="<?=$film['nom']?>"><br/>
            <input type="number" min='0' max='5' name='note' placeholder="Note" value="<?=$film['note']?>"><br/>
            <textarea name="resume" placeholder="Résumé"><?=$film['resume']?></textarea><br/>
            <input type="submit" value="Modifier">
        <?php } ?>

    </form>
    <a href='list.php'>Retour</a>
</body>
</html>