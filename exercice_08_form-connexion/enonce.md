# Exercice 8 : Formulaire de connexion

Source : *TR2 BasesDeDonnéesEtDéveloppementBackEnd Syllabus 2026*, page 46 (page 48 du PDF).

## Contexte

Formulaire de connexion avec session. Initialement, seul Bill peut se connecter avec bill / bill.

## Consignes
1. Essayez le formulaire en vous connectant avec les identifiants « bill / bill », puis
déconnectez-vous. Vous remarquerez que le formulaire de déconnexion doit être
soumis 2 fois pour revenir sur le formulaire de connexion. Ceci car session_destroy
détruit les fichiers de session, mais pas la variable $_SESSION. Corrigez cela en codant
une redirection vers la page « index.php » après la destruction de session.
2. Lors de la connexion de Bill,
   - Ajoutez un paramètre « titre » en session. Le titre de Bill est « Monsieur ».
   - Ajoutez un paramètre « admin » en session. Ce paramètre vaut True si
l’utilisateur connecté est un admin. Bill est un admin.
3. Ajoutez la possibilité que Bob se connecte avec les identifiants « bob / bob ».
Bob n’est pas admin. Son titre est « Monsieur ».
4. Ajoutez la possibilité que Betty se connecte avec les identifiants « betty / betty ».
Betty est admin. Son titre est « Madame ».
5. Juste sous le titre `<h1>`Déconnexion`</h1>`, si l’utilisateur connecté est admin,
affichez « Bonjour Monsieur » ou « Bonjour Madame ».
6. En cas de tentative de connexion ratée, prévoyez un sleep(1) : cela crée une latence
rendant difficiles les attaques par force brute.

Les scripts et illustrations du syllabus ne sont pas reproduits ici. Aucune solution ajoutée.
