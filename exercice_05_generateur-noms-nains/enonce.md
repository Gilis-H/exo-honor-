# Exercice 5 : Générateur de noms de nains

Source : *TR2 BasesDeDonnéesEtDéveloppementBackEnd Syllabus 2026*, page 31 (page 33 du PDF).

## Contexte

Le script fourni contient trois tableaux de syllabes.

## Consignes

complétez ce script PHP afin
qu’il génère aléatoirement 20 noms de
nains. Les noms de nains sont composés
de 2 ou 3 syllabes piochées aléatoirement
et concaténées pour former un nom.
1. Dans une boucle for de 20 itérations :
   - Piochez aléatoirement une syllabe de début avec la fonction array_rand() et
enregistrez-là dans un tableau $noms[ ].
   - Dans une condition aléatoire vérifiée 4 fois sur 10 (utilisez la fonction rand()),
piochez aléatoirement une syllabe de liaison et concaténez-la à la syllabe de
début.
   - Pour finir, piochez une syllabe de fin et concaténez-la au reste.
2. Triez le tableau de noms par ordre alphabétique avec la fonction sort().
3. Dans une nouvelle boucle (foreach cette fois), générez le code HTML avec les 20 noms

de nains dans une liste `<ul>`.
4. Accordez à chaque élément de liste, une classe « couleur0 » ou « couleur1 » grâce à

l’opération modulo. Ensuite en CSS, imposez 2 couleurs de texte différentes.
5. Rectifiez la boucle du point 1, afin que chaque nom soit différent. Pour cela, utilisez

une boucle do while() et la fonction in_array().

Les scripts et illustrations du syllabus ne sont pas reproduits ici. Aucune solution ajoutée.
