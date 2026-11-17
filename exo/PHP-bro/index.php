<?php

require("_connexionBD.php");

$listeV=$bd->query('SELECT v.ville,p.code,p.pays,v.id_ville, COUNT(h.id_hotel) 
as nbr FROM villes as v JOIN pays as p ON v.code_pays=p.code 
JOIN hotel as h ON h.id_ville = v.id_ville WHERE h.ouvert=1 GROUP BY v.id_ville 
ORDER BY nbr DESC, v.ville ASC LIMIT 20');


$listeVilles=$bd->query('SELECT v.ville,p.pays,v.id_ville FROM villes as v 
JOIN pays as p ON v.code_pays=p.code ORDER BY v.ville ASC');



$cpt=1;

while($ville = $listeV->fetch())
{
    if($cpt%2==1)
    {
        echo '<b>';
    }

    $img='flags/'.$ville['code'].'.webp';
    if(!file_exists($img))
    {
        $img='flags/DEF.webp';
    }

    echo '<p>',$cpt,'<a href="index.php?id=',$ville['id_ville'],'">',$ville['ville'];
    echo '<img width="20" height="15" src="',$img,'"></a>';
    echo ':',$ville['pays'],' : ';

    for($i=0;$i<$ville['nbr'];$i++)
    {
          echo '<img width="20" height="20" src="images/hotel.png">';
    }

    if($cpt%2==1)
    {
        echo '</b>';
    }


$cpt++;
}


//question 2 !
if(isset($_GET['id']))
{
   $_POST['id_ville']= $_GET['id'];
}

if(isset($_POST['valider']))
{

    $error=false;
    if(preg_match("#[a-zA-Z-']#",$_POST['nom']) && !empty($_POST['nom']))
    {
        $nom =$_POST['nom'];
    }
    else
    {
         $error=true;
    }
    if(!empty($_POST['description']))
    {
        $description = $_POST['description'];
    }
    else
    {
        $error=true;
    }
    if(!$error)
    {
        $id_ville=$_POST['id_ville'];

        $req=$bd->prepare('INSERT INTO hotel( nom,description,id_ville,ouvert) VALUES (?,?,?,1)');
        $req->execute(array($nom,$description,$id_ville));
    }

}
?>


<form method="post" action="index.php">
<p>Nom: <input type="text" name="nom"></p>
<p>Description <textarea name="description"></textarea>
<p>ville : <select name="id_ville">
<?php

while($ville1=$listeVilles->fetch())
{
    if(isset($_POST['id_ville']) && $ville1['id_ville'] == $_POST['id_ville'])
    {
        echo '<option selected value="',$ville1['id_ville'],'">',$ville1['ville'],' - ',$ville1['pays'],'</option>';      
    }
    else
    {
         echo '<option value="',$ville1['id_ville'],'">',$ville1['ville'],' - ',$ville1['pays'],'</option>';
    }
    
   
}

?>


</select></p>
<p><input type="submit" name="valider"></p>

</form>

<?php
 if(isset($_POST['id_ville']))
 {
    $req1=$bd->prepare('SELECT h.nom,h.description, SUM(c.prix*r.nbr_jour) as chiffre
FROM hotel as h 
JOIN chambre as c ON c.id_hotel=h.id_hotel
JOIN reservation as r ON r.id_chambre=c.id_chambre
WHERE id_ville=? 
GROUP BY h.id_hotel
ORDER BY h.nom;');
    $req1->execute(array($_POST['id_ville']));
    $total=0;
    while($h=$req1->fetch())
    {
    $total+=$h['chiffre'];
        echo '<p>',$h['nom'],' : ',$h['description'],' ',$h['chiffre'],'</p>';
    }
    echo $total;
 }


?>








