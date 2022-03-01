<?php
    session_start();
    if (!isset($_SESSION['connected']) || $_SESSION['connected'] != 1) {
        header('location: connect.php');
    }
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
    Secret ici
    <a href='connect.php?disconnect=true'>Déconnexion</a>
</body>
</html>