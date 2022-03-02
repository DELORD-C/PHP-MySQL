<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex 5</title>
</head>
<body>

    <?php

    session_start();

    if (isset($_GET['disconnect'])) {
        session_destroy();
        session_start();
    }

    //un if est interpreté de gauche à droite
    if (isset($_POST['email']) && isset($_POST['password']) && $_POST['email'] == 'a@a.a' && $_POST['password'] == 'a') {
        $_SESSION['connect'] = 1;
    }

    if (!isset($_SESSION['connect']) || $_SESSION['connect'] != 1) {
        ?>
        <form method='post'>
            <input type="email" name='email' placeholder='Email'>
            <input type="password" name='password' placeholder='Password'>
            <input type="submit" value='Connexion'>
        </form>
        <?php
    }

    if (isset($_SESSION['connect']) && $_SESSION['connect'] == 1) {
        ?>
        <div>
            <p>Bonjour</p>
            <a href='?disconnect=true'>Déconnexion</a>
        </div>
        <?php
    }
    ?>
</body>
</html>

<!-- Compléter le code php pour que :
    - Lorsque l'on renseigne la bonne combinaison email + password l'utilisateur soit connecté
    - Lorsque l'utilisateur est connecté, la page affiche la <div> et pas le <form>
    - Lorsque l'on clique sur le lien déconnexion, l'utilisateur est déconnecté et on retrouve le formulaire -->