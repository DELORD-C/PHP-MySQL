# Exercice 11

Nous allons ajouter des fonctionnalités à notre projet MyCMS :

- Vérification que l'utilisateur est connecté pour accéder à toutes les pages du backoffice
- Metter en place la gestion et l'affichage des erreurs de connexion
- Empécher l'accès aux fichiers qui sont censé être inclus et pas lus directement (exemple : `bdd.php`)
- Afficher les informations de l'auteur d'une page sur chaque page
- Ajouter des blocs header et footer modifiables (mais non supprimables) qui seront automatiquement ajouté à chaque page

---

## <u> 1. Vérification de la connexion</u>
Afin de vérifier la connexion d'un utilisateur, il suffit de démarrer la session, et de tester le contenu de la variable `$_SESSION`.

Nous allons donc créer un fichier `auth.php` dans lequel :
- On démarre la session
- On vérifie dans `$_SESSION` que l'utilisateur est connecté
- Si l'utilisateur n'est pas connecté, on le redirige vers la page de connexion

Une fois que notre fichier `auth.php` est prêt, nous n'avons plus qu'à l'inclure en haut de chacun des fichier que l'on veut protéger (tous les fichiers dans le dossier `admin`, sauf `connect.php` et `bdd.php`)

---

## <u> 2. Gestion & Affichage des erreurs de connexion</u>
Pour gérer l'afficahge d'erreur d'une page à l'autre (erreur générée sur un page, puis affichée sur une autre, par exemple, j'essaye d'accéder à une page du back office sans être connecté, l'erreur d'affiche une fois que j'ai été redirigé sur le formulaire de connexion : 'Pour accéder à cette page, merci de vous connecter.'), il faut utiliser la session.

### <u>Démarche :</u>
Lorsqu'une erreur est constatée sur une page, on créé un index dans la variable $_SESSION
```php
$_SESSION['error'] = 'Pour accéder à cette page, merci de vous connecter.'; 
```
avant de rediriger l'utilisateur.

Une fois l'utilisateur redirigé, on vérifie sur la nouvelle page si il existe une variable $_SESSION['error'] et si elle n'est pas vide, on affiche une balise texte avec l'erreur puis on supprime la variable:
```php
if(isset($_SESSION['error']) && !empty($_SESSION['error'])) {
    echo '<p>' . $_SESSION['error'] . '</p>';
    unset($_SESSION['error']); //suppression de la variable
}
```
---

## <u> 3. Restriction de l'accès aux fichiers inclus</u>

### <u>Le fichier `.htaccess` :</u>
Ce fichier sert à préciser à notre serveur des règle de sécurité et de redirection.

Lorsque qu'un fichier `.htaccess` est présent dans un dossier, ses règle s'appliquent à tous les fichiers présents à l'intérieur de celui-ci.

Créer donc un fichier `.htaccess` à la racine de MyCMS.

### <u>Règles et restrictions :</u>
Nous allons commencer par protéger notre fichier `.htaccess`
```php
<Files ~ "^.*\.([Hh][Tt][Aa])"> #ici on cible tous les fichiers commençants par .hta ou .HTA etc...
order allow,deny
deny from all #ici on précise qu'on bloque l'accès
satisfy all
</Files>
```

Ensuite, nous avons deux choix :
- Soit on créé une règle pour chaque fichier qu'on souhaite protéger (bien si on a peu de fichiers)
- Soit on créé une règle globale qui cible une certaine dénomination de fichiers, mais ça nous oblige à renommer les fichiers en question, et donc à changer les liens vers ceux-ci dans notre code. (solution peut être un peu plus compliquée à mettre en place, mais beaucoup plus maintenable et lisible)

Ici, nous allons partir pour la deuxième solution et ajouter le caractère '_' devans chacun de nos fichiers voué à l'inclusion :
- `_bdd.php`
- `_display.php`
- `_home.php`
- `admin/_connect.php`
- `admin/_home.php`

Puis on ajoute notre règle dans notre fichier `.htaccess` pour authoriser ces fichiers à être inclus seulement :
```php
<Files ~ "^\_"> #tous les fichiers commençants pas '_'
    Order Deny,Allow 
    Allow from localhost 127.0.0.1 #uniquement le serveur
    Deny from all
</Files>
```
---

## <u> 4. Affichage des informations de l'auteur</u>

Pour afficher le nom de l'auteur sur les pages, dans `display.php` il nous suffit d'aller cherche l'auteur dans la base de donnée grâce à son `id` (que l'on retrouve dans le champ `auteur` de notre page) puis de récupérer la valeur du champ `nom` et le faire apparaitre dans la page dans une balise `<p>` par exemple.

---

## <u> 5. Ajout des bloc `header` et `footer`</u>

1. <u>Création des blocs</u>

Tout d'abord nous allons créer nos deux nouveaux bloc comme des blocs normaux.

Le bloc header contiendra la partie haute de notre page :
```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{title}</title>
    <!-- ICI ON MET {title} POUR POUVOIR REMPLACER CETTE VALEUR PAR LE TITRE DE NOTRE PAGE EN PHP -->
</head>
<body>
```

Le bloc footer contiendra la partie basse :
```html
</body>
</html>
```

2. <u>Empécher leur suppression</u>

Récupérons ensuite leurs `id` dans `phpmyadmin`.

Nous allons ensuite créer des exceptions dans notre CRUD bloc pour bloquer l'action de suppression sur ces blocs spécifiques.

Dans `admin/bloc/delete.php`, empécher la suppression si l'`id` est égale à celle d'un de nos deux blocs, pour cela rajouter une condition dans le `if` :
```php
!in_array($_GET['id'], [7, 8])
//La fonction in_array($valeur, $tableau) renvoie true si la valeur est présente dans le tableau
```
On teste donc si l'`id` passé en paramètre `$_GET` correspond à l'une de nos `id` de bloc spéciaux et on inverse le résultat avec '!'

3. <u>Les ajouter automatiquement aux pages</u>

Pour ajouter nos blocs à chaque page, nous allons modifier le fichier `display.php` et concaténer nos deux blocs après avoir traité les codes de bloc de notre pages.

On récupère d'abord nos deux blocs avec une requète SQL :
```sql
SELECT * FROM bloc WHERE id IN (7, 8);
```

Une fois qu'on a nos deux blocs on remplace notre code `{title}` par le nom de la page dans notre bloc header avec la fonction `str_replace()` :
```php
str_replace('{title}', $page['nom'], $header);
```

Enfin, on ajoute nos différents blocs à notre page :
```php
echo $header;
echo $page['contenu'];
echo $footer;
```