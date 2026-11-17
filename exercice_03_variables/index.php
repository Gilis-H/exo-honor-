<?php  
$taux_USD = 0.884 ;
$taux_GBP = 1.225 ;
$taux_SEK = 0.096 ;
?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Opérations sur les variables</title>
</head>
<body>
	<?php 
	$prix = 18;
	
	$prix_USD = number_format($prix / $taux_USD, 2, ',', '<br>') ;
	$prix_GBP = number_format($prix / $taux_GBP, 2, ',', '<br>') ;
	$prix_SEK = number_format($prix / $taux_SEK, 2, ',', '<br>') ;

	echo "Le prix est de $prix €<br>" ;
	echo "Le prix est de $prix_USD $<br>" ;
	echo "Le prix est de $prix_GBP £<br>" ;
	echo "Le prix est de $prix_SEK SEK<br>" ;
	?>
</body>
</html>