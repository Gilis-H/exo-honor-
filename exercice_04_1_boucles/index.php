<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Tirages du Lotto</title>
	<style>
	table {text-align:center;}
	table td {border:1px solid #000; padding:0.25rem;}
	</style>
</head>
<body>
	<h1>Tirages du Lotto</h1>
	<?php 
	for ($i=0 ; $i<6 ; $i++) {
		$tirage[$i] = rand(1,50);
	}
	sort($tirage);
	echo "<p>Voici les 6 numéros tirés au sort : </p>";
	// On ouvre la table avant la boucle pour ne la créer qu’une seule fois.
	echo "<table>";
	// La boucle parcourt le tableau des tirages et crée une cellule pour chaque numéro.
	foreach ($tirage as $valeur) {
		echo "<td>$valeur</td>";
	};
	// Une fois la boucle terminée, on ferme la table.
	echo "</table>";
	// Les instructions PHP se terminent par un point-virgule,
	// mais pas les accolades du foreach.
	?>

</body>
</html>
