<?php
require_once '_bd_connexion.php';

$id_pet = $_GET['id_pet'];

$reqpets = $bd->prepare('SELECT pets.id_pet, pets.name, pets.walks, pets.meals, pets.comment, categories.name AS type, categories.icon, categories.max_walks FROM pets LEFT JOIN categories ON pets.id_cat = categories.id_cat WHERE pets.id_pet = ?');
$reqpets->execute([$id_pet]);

if ($reqpets->rowcount() == 0){;
	header('Location:index.php');
	exit();
	}
$pets = $reqpets->fetch(PDO::FETCH_ASSOC);

if ($pets == FALSE){
	header('Location:index.php');
	exit();
}

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
	<main>
		<?php
		echo "<form method='post' action='modif_pet.php?id_pet={$pets['id_pet']}'>";
		echo "<div id='pet'>";
		echo "<img src='icons/{$pets['icon']}' alt=''>";
		echo "<h2>{$pets['name']}</h2>";
		echo "<label for='walks'>walks : <input id='walks' name='walks' type='number' min='0' size='3' value='{$pets['walks']}'></label>";
		echo "<label for='meals'>meals : <input id='meals' name='meals' type='number' min='0' size='3' value='{$pets['meals']}'></label>";
		echo "<label for='comment'>comment : <textarea id='comment' name='comment'>",$pets['comment'],"</textarea></label>";
		echo "<label for='modif'><input type='submit' value='Enregistrer' id='modif' name='modif'></label>";
		echo "</div>";
		echo "</form>";
		// Pour utiliser les infos du Form $_POST['name']
		if(isset($_POST['modif'])){
			$requpdatepets= $bd->prepare('UPDATE pets Set pets.walks= ?, pets.meals= ?,pets.comment = ? WHERE pets.id_pet = ?');
			$requpdatepets->execute([$_POST['walks'], $_POST['meals'], $_POST['comment'], $pets['id_pet']]);

			$_SESSION['id_pet_session'][]=$pets['id_pet'];

			header('Location:index.php');
			exit();
			}
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
