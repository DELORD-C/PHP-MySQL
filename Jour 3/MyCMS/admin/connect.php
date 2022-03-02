<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion au Back Office</title>
</head>

<?php
    if (isset($_POST['login']) && isset($_POST['password'])) {
        include('bdd.php');
        $query = $bdd->prepare("SELECT password, id FROM utilisateur WHERE nom = :nom;");
        $query->execute(["nom" => $_POST['login']]);
        $pass = $query->fetch();

        if (!empty($pass) && $pass['password'] == $_POST['password']) {
            $_SESSION['connected'] = 'true';
            $_SESSION['id'] = $pass['id'];
        }
        
        header('refresh: 0');
    }
?>

<body>
    <form method="post">
        <input type="text" name='login' placeholder='Login'><br>
        <input type="password" name='password' placeholder='Mot de passe'><br>
        <input type="submit" value="Connexion">
    </form>
</body>
</html>