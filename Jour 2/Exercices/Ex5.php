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



    ?>
    
    <form method='post'>
        <input type="email" name='email' placeholder='Email'>
        <input type="password" name='password' placeholder='Password'>
        <input type="submit" value='Connexion'>
    </form>
    
    <?php

    

    ?>

    <div>
        <p>Bonjour</p>
        <a href='?disconnect=true'>Déconnexion</a>
    </div>
</body>
</html>

<!-- Compléter le code php pour que :
    - Lorsque l'on renseigne la bonne combinaison email + password l'utilisateur soit connecté
    - Lorsque l'utilisateur est connecté, la page affiche la <div> et pas le <form>
    - Lorsque l'on clique sur le lien déconnexion, l'utilisateur est déconnecté et on retrouve le formulaire -->