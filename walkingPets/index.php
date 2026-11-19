<?php
require_once '_bd_connexion.php'
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
	$reqpets=$bd->prepare('SELECT pets.id_pet, pets.name, pets.walks, pets.meals, pets.comment, categories.name as type , categories.icon, categories.max_walks FROM pets LEFT JOIN categories ON pets.id_cat=categories.id_cat');
	$reqpets->execute();

	while($pets=$reqpets->fetch()){
		echo "<ul id='pets'>";
		echo "<li class='pet'><a href='modif_pet.php?id_pet={$pets['id_pet']}'>";
		echo "<img src='icons/','{$pets['icon']'' alt=""><h3>"
	};
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