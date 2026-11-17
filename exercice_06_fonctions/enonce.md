# Exercice 6 : Fonctions

Source : *TR2 BasesDeDonnéesEtDéveloppementBackEnd Syllabus 2026*, page 34 (page 36 du PDF).

## Contexte

Afficher les membres de Web Atomic Pickles. Le fichier _team_members.php contient les données dans un tableau à deux dimensions.

## Consignes

- Complétez le fichier « _functions.php », en codant 3 fonctions :
  - is_developer() : reçoit un job_title et renvoie true s’il se termine par
« Developer » sinon false. Utilisez la fonction str_ends_with($str, '…')
  - member_picture_url() : reçoit un membre et renvoie l’URL de son avatar :
« img/Marvin_Brown.png »
  - show_member() : reçoit un membre de l’équipe et affiche directement le code
HTML de sa vignette (image, nom et poste du membre).

- Complétez le fichier « index.php » pour afficher les employés en 2 sections : les
développeurs et les autres. Pour cela, codez sous chaque titre `<h2>`, une boucle
parcourant les membres et appelant la fonction d’affichage après avoir testé la
réponse de la fonction « is_developer() ».

Les scripts et illustrations du syllabus ne sont pas reproduits ici. Aucune solution ajoutée.
