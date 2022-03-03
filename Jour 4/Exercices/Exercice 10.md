# Exercice 10

## <u> 1. index.php</u>

Dans votre dossier MyCMS, Créer une page index.php qui sera l'accueil de votre site, sur cette page on doit inclure `home.php` si aucun paramètre `$_GET['page']` n'est renseigné, sinon, on inclu `display.php`.

---

## <u> 2. home.php</u>

home.php doit contenir un squelette html, afficher un message de bienvenue, la liste des pages existantes en base de donnée (avec un lien vers chacune d'elle)
```html
<a href="index.php?page=[ID_DE_LA_PAGE]">[NOM_DE_LA_PAGE]</a>
```
enfin, un lien vers le backoffice (admin.php)

---

## <u> 3. admin.php</u>

cette page doit démarrer la session, et vérifier si l'utilisateur est connecté ou si il souhaite se déconnecter :

Si utilisateur souhaite se déconnecter : détruire la session et raffraichir a la page :
```php
header('location: admin.php');
```

Si utilisateur connecté : inclure admin/home.php
Sinon inclure admin/connect.php

## <u> 4. admin/connect.php</u>
