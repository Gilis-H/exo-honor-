<?php
require_once '_bd_connexion.php'
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