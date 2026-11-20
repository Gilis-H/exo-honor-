<?php
require_once '_bd_connexion.php';

// Ton raisonnement est correct : récupérer en début de page le id_pet présent dans URL,
// le valider, puis le réutiliser comme paramètre de la requête pour charger cet animal.
// Ici, début de page signifie le bloc PHP avant le HTML, pas la balise <head> ni _header.php.
// Le code ci-dessous suit déjà cette démarche.
// Modification : valider le paramètre GET envoyé par le lien de index.php.
$id_pet = filter_var($_GET['id_pet'] ?? null, FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1],
]);
if ($id_pet === false) {
    header('Location: index.php');
    exit;
}

// Modification : WHERE sélectionne uniquement cet animal ; sa valeur est transmise séparément du SQL.
$reqpets = $bd->prepare('SELECT pets.id_pet, pets.name, pets.walks, pets.meals, pets.comment, categories.name AS type, categories.icon, categories.max_walks FROM pets LEFT JOIN categories ON pets.id_cat = categories.id_cat WHERE pets.id_pet = ?');
$reqpets->execute([$id_pet]);
$pets = $reqpets->fetch(PDO::FETCH_ASSOC);

// Modification : un identifiant inexistant renvoie vers index.php.
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
		echo "<form method='post' action='modif_pet.php?id_pet={$pets['id_pet']}'>";
		echo "<div id='pet'>";
		echo "<img src='icons/{$pets['icon']}' alt=''>";
		echo "<h2>{$pets['name']}</h2>";
		?>

		<!--
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