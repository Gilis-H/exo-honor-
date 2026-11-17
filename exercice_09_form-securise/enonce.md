# Exercice 9 : Formulaire sécurisé

Source : *TR2 BasesDeDonnéesEtDéveloppementBackEnd Syllabus 2026*, page 54 (page 56 du PDF).

## Contexte

Compléter les contrôles du formulaire fourni.

## Consignes
1. Le nom : testez le formulaire en entrant un nom accompagné de balises HTML (gras,
italique, etc.) et constatez le résultat.
Corrigez le traitement PHP afin de supprimer toutes les balises et, au passage, trimez
le nom pour effacer les espaces superflus en début et fin de nom.
2. L’année : à l’aide des outils de développement du navigateur, piratez le formulaire
afin de signaler être né en 1879, comme Albert Einstein.
Corrigez le traitement PHP afin de signaler une erreur si l’année de naissance est
vide, ou si elle est inférieure à 1900 ou supérieure à l’année actuelle.
Profitez-en pour bloquer toute tentative d’injection de code via ce champ en
appliquant une conversion forcée en entier.
3. Le fruit préféré : à l’aide des outils de développement du navigateur, piratez
(modifiez) l’interface HTML, afin d’envoyer comme fruit préféré la « patate ».
Corrigez le traitement PHP afin d’appliquer la méthode de la liste blanche : seuls les
fruits de la liste sont permis. Toute autre valeur signale une erreur dans le champ.
4. Le titre : Ajoutez le choix du titre sous forme de deux boutons radio, accompagnés de
label, ramenant la valeur « Monsieur » ou « Madame ». Lors du traitement du
formulaire assurez-vous qu’aucune autre valeur n’est permise (y compris une valeur
vide).
Ajoutez le titre devant le nom dans le message « Bonjour… ».
En cas d’erreur, les deux boutons radio et leurs intitulés passent en rouge.
Le bouton coché doit rester coché après envoi.
5. J’ai lu : ajoutez un bouton checkbox « J’ai lu et j’approuve les conditions
d’utilisation. » ramenant la valeur « ok ».
Ici aussi l’intitulé doit être cliquable au même titre que sa checkbox.
Lors du traitement du formulaire, assurez-vous que ce bouton a été coché,
autrement c’est une erreur et le texte doit apparaître en rouge.
Cette case n’est jamais cochée par défaut afin de demander systématiquement une
action humaine pour la cocher.

Les scripts et illustrations du syllabus ne sont pas reproduits ici. Aucune solution ajoutée.
