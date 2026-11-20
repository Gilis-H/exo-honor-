<?php
// [TON CODE] Inclusion de la connexion ; [CODEX] ajout du point-virgule.
require_once '_bd_connexion.php';

// [TON IDEE] Récupérer le id_pet sélectionné en début de page, puis le réutiliser dans la requête.
// [CODEX - IMPLEMENTATION] Le bloc de validation et les redirections ci-dessous ont été écrits par Codex.
// Début de page désigne ici le PHP avant le HTML, pas <head> ni _header.php.
// [CODEX] Validation du paramètre GET : entier positif obligatoire.
$id_pet = filter_var($_GET['id_pet'] ?? null, FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1],
]);
if ($id_pet === false) {
    header('Location: index.php');
    exit;
}

// [TON CODE ADAPTE PAR CODEX] Tu avais écrit le SELECT avec la jointure et un tri par nom.
// Codex a déplacé la requête avant le HTML et remplacé le tri par WHERE pets.id_pet = ?.
// [CODEX] execute reçoit maintenant $id_pet ; fetch utilise explicitement PDO::FETCH_ASSOC.
$reqpets = $bd->prepare('SELECT pets.id_pet, pets.name, pets.walks, pets.meals, pets.comment, categories.name AS type, categories.icon, categories.max_walks FROM pets LEFT JOIN categories ON pets.id_cat = categories.id_cat WHERE pets.id_pet = ?');
$reqpets->execute([$id_pet]);
$pets = $reqpets->fetch(PDO::FETCH_ASSOC);

// [CODEX] Redirection si aucun animal ne correspond à cet identifiant.
// La requête précède le HTML pour permettre cette redirection avec header().
if ($pets === false) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Walking Pets - modification</title>
	<!-- metas -->
	 	<?php
	include_once '_metas.php'
	?>
</head>
<body>
	<!-- header -->
	 	<?php
	include_once '_header.php'
	?>
	<main>
		<?php
		// [TON CODE] Affichage du formulaire, de son lien, de la photo et du nom.
		echo "<form method='post' action='modif_pet.php?id_pet={$pets['id_pet']}'>";
		echo "<div id='pet'>";
		echo "<img src='icons/{$pets['icon']}' alt=''>";
		echo "<h2>{$pets['name']}</h2>";
		?>

		<!-- Exemple HTML fourni avec le cours, conservé comme référence.
		<form method="post" action="modif_pet.php?id_pet=16">
			<div id="pet">
				<img src="icons/leash.png" alt="">
				<h2>Babar</h2>
				<label for="walks">walks : <input id="walks" name="walks" type="number" min="0" size="3" value="3"></label>
				<label for="meals">meals : <input id="meals" name="meals" type="number" min="0" size="3" value="3"></label>
				<label for="comment">comment : <textarea id="comment" name="comment"></textarea></label>
				<label for="modif"><input type="submit" value="Enregistrer" id="modif" name="modif"></label>
			</div>
		</form>	
		-->
	</main>
	<!-- footer -->
	 	<?php
	include_once '_footer.php'
	?>
</body>
</html>