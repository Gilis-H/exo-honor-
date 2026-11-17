<?php
$liste_fruits = array('banane', 'framboise', 'kiwi', 'pomme');
$fruit = $liste_fruits[0];
$genre = "aucun";
	
// $_POST contient les données reçues via une requête POST.
// isset() indique si une variable existe et vaut autre chose que null.
if ( isset($_POST['enregistrement']) ) {
	// empty() teste si une variable est absente ou équivaut à false, notamment une chaîne vide ou zéro.
	if ( !empty($_POST['nom']) ) $nom = $_POST['nom'] ;
	else $erreurs['nom'] = true;
	// trim() renvoie le texte sans espaces aux extrémités.
	// strip_tags() renvoie le texte sans balises HTML ; la variable originale ne change pas automatiquement.
	$nom = strip_tags(trim($nom));
	
	// (int) convertit en entier, sans vérifier les limites autorisées.
	$annee = (int) $_POST['annee'];
	// Ancien test : la condition est vraie quand les deux limites sont respectées.
	// Le bloc enregistre donc une erreur pour une année valide, et aucune pour une année hors limites.
	// if ($annee >= 1900 && $annee <= date('Y')){
	//     $erreurs['annee'] = true;
	// }
	if ($annee < 1900 || $annee > date('Y')){
		$erreurs['annee'] = true;
	}

	$fruit = $_POST['fruit'] ;
	if (in_array($fruit, $liste_fruits));
	else $erreurs['fruit'] = true;

	if (!isset($_POST['genre'])) {
    $erreurs['genre'] = true;
	} 
	else {
    $genre = $_POST['genre'];

    if (!in_array($genre, ['Monsieur', 'Madame'], true)) {
        $erreurs['genre'] = true;
    }
}
	
	// Étape 5 : une checkbox non cochée est absente de $_POST ; ?? fournit alors null.
	// Étape 5 : on exige exactement la valeur attendue, pas seulement la présence du champ.
	if (($_POST['conditions'] ?? null) !== 'ok') {
		$erreurs['conditions'] = true;
	}

	if (empty($erreurs)) { 
		$form_correct = True;
	}
}
?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Formulaire avec gestion des erreurs</title>
	<style>
	.red { color:red; }
	</style>
</head>
<body>
	<h1>Inscription</h1>
	
	<?php
	if ( !empty($form_correct) ) {
		// echo écrit dans la réponse HTML ; les guillemets doubles permettent de substituer les variables.
		echo "<p>Bonjour $genre $nom,";
		echo "vous êtes né en $annee et ";
		echo "votre fruit préféré est : $fruit</p>";
	}
	?>
	
	<form method="post" action="index.php" autocomplete="off">
	
		<p <?php if ( isset($erreurs['nom']) ) echo 'class="red"'; ?>>
			<label for="nom">Nom :<br> 
				<input type="text" id="nom" name="nom" value="<?php if (isset($nom)) echo $nom; ?>" >
			</label>
			
		<p <?php if ( isset($erreurs['genre']) ) echo 'class="red"'; ?>> 
			<label for="genre">Genre : <br>
				<input type="radio" name="genre" value="Monsieur" <?= $genre === 'Monsieur' ? 'checked' : '' ?>> Monsieur
				<input type="radio" name="genre" value="Madame" <?= $genre === 'Madame' ? 'checked' : '' ?>> Madame
			</label>
		<!-- date() renvoie une date formatée. La balise PHP courte avec égal affiche directement le résultat. -->
		<p <?php if ( isset($erreurs['annee']) ) echo 'class="red"'; ?>>
			<label for="annee">Année de naissance :<br> 
				<input type="number" id="annee" name="annee" step="1" min="1900" max="<?= date('Y') ?>" value="<?php if (isset($annee)) echo $annee; ?>">
			</label>
		
		<p <?php if ( isset($erreurs['fruit']) ) echo 'class="red"'; ?>>
			<label for="fruit">Fruit préféré :<br> 
				<select id="fruit" name="fruit">
					<?php
					foreach ($liste_fruits as $f) {
						echo '<option value="',$f,'" ', ($fruit==$f)?'selected':'' ,'>',$f;
					}
					?>
				</select>
			</label>
			
		<p <?php if (isset($erreurs['conditions'])) echo 'class="red"'; ?>>
            <label for="conditions">
                <input type="checkbox" id="conditions" name="conditions" value="ok">
                J’ai lu et j’approuve les conditions d’utilisation.
            </label>
        </p>

        <p><input type="submit" name="enregistrement" value="Enregistrer">
		
	</form>
</body>
</html>