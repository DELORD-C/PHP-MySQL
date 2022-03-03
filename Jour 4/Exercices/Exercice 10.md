# Exercice 10

Pour commencer créer un dossier MyCMS dans Jour 4,
puis créer un dossier admin dans celui-ci.

Copier coller les fichier `bdd.php` et `env.json` depuis MyCMS dans jour 3 dans le dossier admin récemment créé.

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

---

## <u> 4. admin/connect.php</u>

Dans cette page :

Si l'utilisateur à envoyé les données du formulaire en $_POST, on va récupérer en base de donnée le mot de passe associer au login qu'il a envoyé.

Si celui existe et qu'il est correct, on connect l'utilisateur dans $_SESSION en stockant aussi son id :
```php
$_SESSION['connected'] = 'true';
$_SESSION['id'] = $pass['id'];
```

Sinon, on rafraichit la page :
```php
header('refresh: 0');
```

Par défaut, on affiche un formulaire de connexion avec login + mot de passe

---

## <u> 5. admin/home.php</u>

Dans cette page, on affiche seulement:
- Un message de bienvenue
- Un lien vers la liste des blocs (admin/bloc/list.php)
- Un lien vers la liste des pages (admin/page/list.php)
- Un lien de déconnection (admin.php?disconnect=true)

---

## <u> 6. admin/home.php</u>

