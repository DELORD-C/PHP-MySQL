<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>

<?php
    //on démarre la session
    session_start();

    //si l'utilisateur veux se déconnecter
    if (isset($_GET['disconnect'])) {
        //on détruit la session
        session_destroy();
        //puis on la redémarre
        session_start();
    }

    //on vérifie que la variable $_POST['password'] existe et qu'elle a la bonne valeur
    if (!empty($_POST) && isset($_POST['password']) && $_POST['password'] == 'aze') {
        //si le mot de passe est bon, on créé un index 'connected' dans la variable de session
        $_SESSION['connected'] = 1;
    }

    //on vérifie si l'utilisateur est connecté en testant la variable de session
    if (isset($_SESSION['connected']) && $_SESSION['connected'] == 1) {
        //si il est connecté, on le redirige vers la page admin.php
        header('location: admin.php');
    }

//par défaut, on affiche le formulaire de connexion
?>
<body>
    <form method='POST'>
        <input type="password" name='password'>
        <input type="submit" value='Connect'>
    </form>
</body>
</html>

