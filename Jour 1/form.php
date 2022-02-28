<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    <form action="" method='POST' enctype="multipart/form-data">
        <input type="text" name="id">
        <input type="password" name="pass">
        <input type="file" name='file'>
        <input type="submit" value='Envoyer'>
    </form>
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    if ($_POST['id'] == 'root' && $_POST['pass'] == 'root') {
        echo '<img src="img.png">';
    }

    if (!empty($_FILES)) {
        $dir = '/upload/';
        $newFile = $dir . $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $newFile);
    }
    ?>
</body>
</html>