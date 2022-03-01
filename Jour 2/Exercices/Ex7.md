- Créer une page php avec un formulaire permettant d'ajouter un film à la base de donnée
(avec les champs correspondants à la base donnée)

- Récupérer les données du formulaire en POST et ajouter la nouvelle entrée à la base de donnée
```SQL
INSERT INTO table (colonne1, colonne2, colonne3) VALUES ('valeur1', 'valeur2', 'valeur3');
```

```php
$requete = $bdd->prepare("INSERT INTO table (colonne1, colonne2, colonne3) VALUES ('valeur1', 'valeur2', 'valeur3');");
$requete->execute();
```