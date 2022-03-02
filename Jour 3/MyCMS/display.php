<?php

include('admin/bdd.php');
$requete = $bdd->prepare("SELECT * FROM page WHERE id = :id");
$requete->execute(['id' => $_GET['page']]);
$page = $requete->fetch();

$regex = "";

// preg match all sert à rechercher toutes les occurence d'une regex (1er parametre)
// dans une chaine de caractères (2e paramètre) et stocker les résultats dans un tableau (3e parametre)
preg_match_all('/{bloc:([0-9]+)}/', $page['contenu'], $resultats);

if (!empty($resultats)) {
    foreach ($resultats[0] as $index => $blocCode) {
        // on récupère l'id dans le deuxième tableau
        $id = $resultats[1][$index];
        $requete = $bdd->prepare("SELECT contenu FROM bloc WHERE id = :id");
        $requete->execute(['id' => $id]);
        $bloc = $requete->fetch();

        //on remplace le Code du bloc par le contenu du bloc correspondant
        $page['contenu'] = str_replace($blocCode, $bloc['contenu'], $page['contenu']);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$page['nom']?></title>
</head>
<body>
    <?=$page['contenu']?>
</body>
</html>