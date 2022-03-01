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

    if (isset($_SESSION['connect']) && $_SESSION['connect'] == 1) {
        include('templates/home.html');
    } 
    else {
        include('templates/form.html');
    }
    
    ?>
</body>
</html>