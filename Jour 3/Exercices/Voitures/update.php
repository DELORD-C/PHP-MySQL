<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php

    if (!isset($_GET['id'])) {
        header('location: list.php');
    }

    include('../../../Jour 2/BDD/connect.php');

    foreach ($_POST as $key => $value) {
        $_POST[$key] = htmlspecialchars($value);
    }

    if (isset($_POST['marque'])) {

        if (!empty($_FILES) && $_FILES['image']['size'] > 0) {
            $filename = time() . '-' . $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], 'upload/' . $filename);

            //on supprime l'ancienne image
            unlink('upload/' . $_POST['oldimg']);
        }
        else {
            //si pas de fichier uploadé, on récupère la valeur de notre ancienne image, passé par notre champ oldimg hidden
            $filename = $_POST['oldimg'];
        }


        $requete = $bdd->prepare("UPDATE voiture SET marque = :marque, modele = :modele, version = :version, puissance = :puissance, nbportes = :nbportes, prix = :prix, image = :image WHERE id = :id");

        $requete->execute([
            'marque' => $_POST['marque'],
            'modele' => $_POST['modele'],
            'version' => $_POST['version'],
            'puissance' => $_POST['puissance'],
            'nbportes' => $_POST['nbportes'],
            'prix' => $_POST['prix'],
            'image' => $filename,
            'id' => $_GET['id']
        ]);
    }

    $requete = $bdd->prepare("SELECT * FROM voiture WHERE id = :id");
    $requete->execute(['id' => $_GET['id']]);
    $voiture = $requete->fetch();
    ?>
    <title>Editer voiture - <?=$voiture['marque'] . ' ' . $voiture['modele']?></title>
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
        <input type="text" name='marque' placeholder="Marque" value="<?=$voiture['marque']?>"><br/>
        <input type="text" name='modele' placeholder="Modele" value="<?=$voiture['modele']?>"><br/>
        <input type="text" name='version' placeholder="Version" value="<?=$voiture['version']?>"><br/>
        <input type="number" name='puissance' placeholder="Puissance" value="<?=$voiture['puissance']?>"><br/>
        <input type="number" name='nbportes' placeholder="Nombre de portes" value="<?=$voiture['nbportes']?>"><br/>
        <input type="number" name='prix' placeholder="Prix" value="<?=$voiture['prix']?>"><br/>
        <img style="width: 200px;" src="upload/<?=$voiture['image']?>"><input type="file" name='image'><br/>
        <!-- On ajoute un champ oldimg de type hidden pour passer la valeur de notre image actuel au cas ou 
        on upload pas de nouvelle image -->
        <input type='hidden' value="<?=$voiture['image']?>" name='oldimg'>
        <input type="submit" value="Modifier">
    </form>
    <a href='list.php'>Retour</a>
</body>
</html>