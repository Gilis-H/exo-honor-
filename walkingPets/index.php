<?php
require_once '_bd_connexion.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Walking Pets</title>
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

	<?php
	$reqpets=$bd->prepare('SELECT pets.id_pet, pets.name, pets.walks, pets.meals, pets.comment, categories.name as type , categories.icon, categories.max_walks FROM pets LEFT JOIN categories ON pets.id_cat=categories.id_cat ORDER BY pets.name ASC');
	$reqpets->execute();
	echo "<ul id='pets'>";
	while($pets=$reqpets->fetch()){
		echo "<li class='pet'><a href='modif_pet.php?id_pet={$pets['id_pet']}'>";
		$estModifie = in_array($pets['id_pet'], $_SESSION['id_pet_session'] ?? []);
		$classeNom = "";
		if ($estModifie) {
			$classeNom = " class='modif'";
		}

		if (empty($pets['icon'])){
			echo "<img src='icons/unknown.png' alt=''>";
		}
		else {
			echo "<img src='icons/{$pets['icon']}' alt=''>";
		}
		echo "<h3{$classeNom}>{$pets['name']}</h3>";
		if ($pets['walks']>$pets['max_walks']){
		echo "<p>walks : <s>{$pets['walks']}</s> {$pets['max_walks']}</p>";
		}
		else{
		echo "<p>walks : {$pets['walks']}</p>";
		}

		
		echo "<p>meals : {$pets['meals']}</p>";
		if (empty($pets['comment'])){

		}
		else{
			echo "<p title='{$pets['comment']}'>- remarque -</p>";
		}

		echo "</a></li>";
	};
	echo "</ul>"
	?>
		<!--
		<ul id="pets">
			<li class="pet"><a href="modif_pet.php?id_pet=20">
				<img src="icons/parrot.png" alt=""><h3>Albator</h3>
				<p>walks : 0</p>
				<p>meals : 2</p>
			</a></li>
			<li class="pet"><a href="modif_pet.php?id_pet=4">
				<img src="icons/unknown.png" alt="">
				<h3>Brownie</h3>
				<p>walks : <s>2</s> 0</p>
				<p>meals : 3</p>
				<p title="Brownie est un raton-laveur.">- remarque -</p>
			</a></li>
		</ul>
		-->
	</main>
	<!-- footer -->
	<?php
	include_once '_footer.php'
	?>
</body>
</html>
