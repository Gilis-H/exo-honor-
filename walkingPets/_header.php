<header>
	<h1><a href="index.php">Walking Pets</a></h1>
	<?php
	$req_head=$bd->prepare('Select name from categories');
	$req_head->execute();
	
	echo '<h2> &ndash;';
	while($name_cat = $req_head->fetch()){
		echo $name_cat['name'].  '&ndash;';
	}
	echo '</h2>';
	?>
	
	<!-- 
	<h2> &ndash; chien &ndash; chat &ndash; rongeur &ndash; oiseau &ndash; lapin &ndash; poisson &ndash; reptile &ndash; </h2>
	-->
	<p>L'équipe de <strong>Walking Pets</strong> s'occupe de vos animaux de compagnie.
	<p>Au menu : plusieurs promenades* et repas par jour.</p> 
</header>