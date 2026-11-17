# Exercice 7 : Paramètres GET

Source : *TR2 BasesDeDonnéesEtDéveloppementBackEnd Syllabus 2026*, page 39 (page 41 du PDF).

## Contexte

Le script fourni récupère le paramètre GET page, le convertit en entier et utilise 1 par défaut. Trois pages sont proposées.

## Consignes

Les paramètres GET sont facilement modifiables par les utilisateurs. À partir du script ci-
dessus :
- Ajoutez un test sur la valeur du paramètre : si celle-ci est plus petite que 1 ou plus
grande que 3, codez une redirection vers la page 1. Testez l’efficacité de votre code
en modifiant le paramètre GET directement dans le champ URL de votre navigateur,
en essayant d’accéder aux pages 88, -15 et 0.
- Ajoutez un lien à la navigation : « Page suivante » redirigeant le visiteur vers la page
suivante (de 1 vers 2 ; de 2 vers 3 et de 3… vers 1 !)
- Ajoutez un lien à la navigation : « Page précédente » redirigeant le visiteur vers la
page précédente (de 3 vers 2 ; de 2 vers 1 et de 1… vers 3 !)
- Ajoutez du CSS interne (`<style>`) pour que la couleur du texte dépende de la page
visitée : texte en rouge sur la page 1, en bleu sur la page 2 et en vert sur la page 3.

Les scripts et illustrations du syllabus ne sont pas reproduits ici. Aucune solution ajoutée.
