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
	$nb_tirages = rand(4,10) ;
	for ($tirage=1 ; $tirage<=$nb_tirages ; $tirage++) {
		for ($i=0 ; $i<6 ; $i++) {
			$numeros[$tirage][$i] = rand(1,50);
		}
		sort($numeros[$tirage]);
	}
	echo "<table>";
	foreach ($numeros as $set_de_valeur){
		echo "<tr>";
		foreach ($set_de_valeur as $valeur){
			echo "<td>$valeur</td>";
		}
		echo"</tr>";
			
	}
	echo "</table>";
	?>
</body>
</html>