# Exercice 9

1. BDD

Créer une table voitures avec les champs :
- Marque
- Modèle
- Version (optionnel)
- Puissance
- Nombre de portes
- Prix neuf
- Image

---

2. PROJET
- Créer un dossier Voiture dans Jour 2/Exercices
- Créer 5 fichiers :
    - `create.php`
    - `read.php`
    - `update.php`
    - `delete.php`
    - `list.php`

---

3. CREATE

Dans `create.php`, mettre en place un formulaire permettant de renseigner tous les champs correspondant à l'objet `voiture` de la base de donnée.

Lorsque l'on soumet le formulaire une nouvelle entréer doit être créée dans la base de donnée.

(l'image doit être un champ de type `file` et elle doit être uploadé et sauvegardée lors de la validation).

---

4. LIST

Dans `list.php`, afficher une liste de toutes les voitures sous forme de bloc, avec affichage de l'image correspondante.

Pour chaque voiture, ajouter des liens Voir, Modifier et Supprimer (avec id en paramètre GET).

---

5. READ

Dans `read.php`, afficher les détails de la voiture dont l'id correspond à celle passé en paramètre GET

---

6. UPDATE

Dans `update.php`, afficher les détails de la voiture dont l'id correspond à celle passé en paramètre dans un formulaire.

Si on soumet le formulaire, les modifications sont sauvegardées en base de donnée.

---

7. DELETE

Dans `delete.php`, supprimer l'entrée en base de donnée et rediriger l'utilisateur vers list.php.