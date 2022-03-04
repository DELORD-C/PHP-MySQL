# Exercice 10

Pour commencer créer un dossier MyCMS dans Jour 4,
puis créer un dossier admin dans celui-ci.

Copier coller les fichier `bdd.php` et `env.json` depuis MyCMS dans jour 3 dans le dossier admin récemment créé.

## <u> 1. index.php</u>

Dans votre dossier MyCMS, Créer une page index.php qui sera l'accueil de votre site, sur cette page on doit inclure `home.php` si aucun paramètre `$_GET['page']` n'est renseigné, sinon, on inclu `display.php`.

---

## <u> 2. home.php</u>

home.php doit contenir un squelette html et afficher :
- Un message de bienvenue
- La liste des pages existantes en base de donnée (avec un lien vers chacune d'elle) -> il faut donc récupérer la liste des pages avec une requète SQL
```html
<a href="index.php?page=[ID_DE_LA_PAGE]">[NOM_DE_LA_PAGE]</a>
```
- Un lien vers le backoffice (admin.php)

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

Si l'utilisateur à envoyé les données du formulaire en `$_POST`, on va récupérer en base de donnée le mot de passe associer au login qu'il a envoyé.

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
- Un lien vers la liste des blocs (`admin/bloc/list.php`)
- Un lien vers la liste des pages (`admin/page/list.php`)
- Un lien de déconnection (`admin.php?disconnect=true`)

---

## <u> 6. admin/bloc/</u>

Dans le dossier bloc, créer les pages d'un CRUD pour les blocs (sans le read, car on considère que l'on peut voir l'objet au même endroit que là où on le modifie)
Donc créer 4 pages :
- `list.php`
- `create.php`
- `update.php`
- `delete.php`

Reprennez les champs de la base de donnée pour alimenter les champs des formulaires.

---

## <u> 7. admin/page/</u>

Idem que pour les blocs, mais avec les pages.
On ajoute juste une précision à coté du champs `contenu` sur les pages `create.php` et `update.php` :
```html
<p>Insérez des blocs ci-dessus en utilisant la syntaxe suivantes :</p>
<p>{bloc:[ID DU BLOC]}</p>
```

---

## <u> 8. display.php</u>

Tout d'abord, on va récupérer notre page avec une requète SQL :
```SQL
SELECT * FROM page WHERE id = :id
```

Une fois qu'on a récupéré notre page, on vas analyzer son contenu et récupérer les Codes de Bloc* qu'il contient à l'aide d'une Regex**, on utilise pour cela la fonction php `preg_match_all()`

```php
preg_match_all($regex, $cible, $resultats);
```

La regex qu'on utilise va nous renvoyer un tableau contenant lui même 2 tableaux :
```php
array(2) { //tableau global
  [0]=> //premier tableau
  array(2) {
    [0]=>
    string(8) "{bloc:3}"
    [1]=>
    string(8) "{bloc:4}"
  }
  [1]=> //deuxième tableau
  array(2) {
    [0]=>
    string(1) "3"
    [1]=>
    string(1) "4"
  }
}
```
<i>Le premier tableau (index 0) contient la liste des codes de bloc entiers, le deuxième tableau (index 1) contient la liste des id de blocs correspondants</i>

On vérifie que le tableau global n'est pas vide, puis on itère sur le premier tableau.

Pour chaque code de bloc :
- On récupère l'id correspondant au même index dans le deuxième tableau :
```php
$id = $resultats[1][$index];
```
- On récupère le contenu du bloc correspondant à cette id dans la base de donnée :
```sql
SELECT contenu FROM bloc WHERE id = :id
```
- On remplace le code de bloc par son contenu dans le contenu de notre page grâce à la fonction `str_replace()` :
```php
$page = str_replace($blocCode, $contenu, $page);
```

Enfin, on affiche une page html complète en mettant le titre de notre page dans la balise `<title>` et en plaçant le contenu de la page mis à jour à l'intérieur de la balise `<body>`

---

<i><u>* Codes de Bloc :</u> ce sont les chaines de caractère que l'on utilise pour identifier nos blocs dans nos pages (ex: `{bloc:4}` pour le bloc avec l'id 4)

<u>** Regex :</u> Expression Régulière, permet de rechercher un schéma dans une chaine de caractères. La regex utilisée pour cherche les codes de blocs : `/{bloc:([0-9]+)}/`</i>