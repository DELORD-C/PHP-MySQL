<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>

<?php

    session_start();

    if (isset($_GET['disconnect'])) {
        session_destroy();
        session_start();
    }

    if (!empty($_POST) && isset($_POST['password']) && $_POST['password'] == 'aze') {
        $_SESSION['connected'] = 1;
    }

    if (isset($_SESSION['connected']) && $_SESSION['connected'] == 1) {
        header('location: admin.php');
    }

?>

<body>
    <form method='POST'>
        <input type="password" name='password'>
        <input type="submit" value='Connect'>
    </form>
</body>
</html>

