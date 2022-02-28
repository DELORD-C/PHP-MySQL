<!-- Créer un formulaire contenant les champs suivants :
    - Nom (type texte)
    - Prénom  (type texte)
    - Email (type texte)
    - Message (type textarea)
    - Envoyer (type submit)

Lorsque l'on envoi le formulaire, un email doit être envoyé avec les informations suivantes :
(avec la fonction mail(), simuler un envoi en local)

Destinataire : [email]
Sujet : "Demande de contact [nom] [prenom]"
Message : [message] -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 3</title>
</head>
<?php

    if (!empty($_POST) && isset($_POST['email'])) {
        mail($_POST['email'], "Demande de contact " . $_POST['nom'] . ' ' . $_POST['prenom'], $_POST['message']);
    }

?>
<body>
    <form method='post'>
        <input type="text" name="nom" placeholder="Nom"><br/>
        <input type="text" name="prenom" placeholder="Prénom"><br/>
        <input type="text" name="email" placeholder="Email"><br/>
        <textarea name="message" placeholder="Votre message"></textarea><br/>
        <input type="submit" value="Envoyer">
    </form>
</body>
</html>