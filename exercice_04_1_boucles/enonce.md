# Exercice 4.1 : Boucles

Source : *TR2 BasesDeDonnéesEtDéveloppementBackEnd Syllabus 2026*, page 29 (page 31 du PDF).

## Contexte

Le script fourni dans le cours génère un tableau à une dimension contenant 6 numéros pour la loterie, choisis aléatoirement entre 1 et 50.

## Consignes

- À la suite de ce script, et en utilisant une boucle `foreach()`, affichez les résultats dans un `<table>`.
- Complétez le script ci-dessus, de façon qu’après avoir pioché les 6 numéros, le tirage soit trié avec la fonction `sort()`.

Le code d’exemple du syllabus n’est pas reproduit ici, conformément à ta demande de ne pas écrire de code.

## Rappels essentiels

Compléments discutés ensemble, distincts des consignes du syllabus.

- **Tableau PHP** : stocke plusieurs valeurs repérées par des clés ou indices.
- **`for`** : répète des instructions selon une initialisation, une condition et une évolution du compteur.
- **`rand(min, max)`** : génère un entier entre les deux bornes incluses. Des doublons sont possibles.
- **`foreach ($tableau as $valeur)`** : parcourt le tableau ; `$valeur` reçoit chaque élément à tour de rôle. Sans accolades, seule l’instruction suivante est répétée.
- **HTML** : `table` → tableau, `tr` → ligne, `td` → cellule. Pour une ligne de six numéros, ouvrir la table et la ligne avant la boucle, créer les cellules dans la boucle, puis fermer la ligne et la table.
- **`sort($tirage)`** : trie directement `$tirage` par ordre croissant, après la génération et avant l’affichage. La fonction renvoie `true`, pas le tableau trié : inutile d’affecter son résultat à une autre variable.
- **Affectation `=`** : évalue la partie droite, puis stocke son résultat dans la variable de gauche. Une fonction peut modifier un tableau et renvoyer une autre valeur.
- **Syntaxe** : `.` concatène les chaînes ; les arguments d’une fonction vont entre parenthèses ; les instructions se terminent par `;`, mais pas l’accolade fermante du `foreach`.
- **Exécution** : démarrer Apache dans XAMPP et ouvrir http://127.0.0.1/exercice_04_1_boucles/ pour exécuter le PHP.
