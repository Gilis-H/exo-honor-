<?php

require_once('_connexionBD.php');


$req11 = $bd->query('SELECT p.code,p.pays,v.ville, COUNT(*) as nbr FROM villes as v JOIN hotel AS h ON h.id_ville=v.id_ville JOIN pays as p On p.code = v.code_pays WHERE h.ouvert=1 GROUP BY h.id_ville  ORDER BY nbr DESC, v.ville LIMIT 20');
$req12 = $bd->query('SELECT h.nom,h.description, SUM(r.nbr_jour*c.prix) FROM hotel as h JOIN chambre as c ON c.id_hotel=h.id_hotel JOIN reservation as r ON r.id_chambre=c.id_chambre WHERE h.ouvert=1 AND h.id_ville = 26 GROUP by h.id_hotel ORDER BY h.nom');

$req21 = $bd->query('SELECT h.id_hotel,h.nom,h.description,v.code_pays,v.ville, Sum(r.nbr_jour*c.prix) as valeur FROM hotel as h join villes as v on v.id_ville=h.id_ville join chambre as c on c.id_hotel=h.id_hotel join reservation as r on r.id_chambre = c.id_chambre  where h.ouvert=1 GROUP BY h.id_hotel ORDER BY h.nom limit 20');
$req22= $bd->query('SELECT e.nom, t.type From employe as e join type_employe as t on t.id_type=e.id_type where e.id_hotel=46 AND e.travaille_encore=1 Order by e.nom');

$req32=$bd->query('SELECT c.nom,t.type From chambre as c join type_chambre as t on t.id_type=c.id_type where c.id_hotel=46  Order by c.nom');
$req31=$bd->query('SELECT h.nom, h.description, v.ville, p.pays, SUM(r.nbr_jour*c.prix) as valeur FROM hotel as h JOIN villes as v ON v.id_ville=h.id_ville JOIN pays as p ON p.code=v.code_pays JOIN chambre as c ON c.id_hotel=h.id_hotel JOIN reservation as r ON r.id_chambre=c.id_chambre WHERE h.ouvert=1 GROUP BY h.id_hotel ORDER BY valeur DESC LIMIT 20');
$cpt=1;

while($data = $req21->fetch()){

    if (file_exists('flags/'.$data['code_pays'].'.webp')) {
        $flag = 'flags/'.$data['code_pays'].'.webp'; 
        
    }
    else
    {
        $flag = 'flags/DEF.webp';
    }

    
    echo $cpt,' : ',' <img src="',$flag,'"> ',$data['ville'],' : ';
    
    if($cpt%2==1){
        echo '<b>';
    }
    echo $data['nom'];

    if($cpt%2==1){
        echo '</b>';
    }
    echo '<br>';
    echo $data['description'],' : ',$data['valeur'],'€<br>';

    $req23=$bd->query('SELECT id_type,type,icone FROM type_chambre ');

    while($data2 = $req23->fetch()){
        echo '<img heigth=40 width=40 src="',$data2['icone'],'"> : ';

        $req24=$bd->query('SELECT COUNT(*) as nbr FROM chambre WHERE id_hotel='.$data['id_hotel'].' AND id_type='.$data2['id_type']);
        $data3 = $req24->fetch();
        echo $data3['nbr'],' ';


        
    }








    echo '<br>';
    $cpt++;
    
    }
























/*$cpt=1;

while($data = $req21->fetch()){

    if (file_exists('flags/'.$data['code_pays'].'.webp')) {
        $flag = 'flags/'.$data['code_pays'].'.webp'; 
        
    }
    else
    {
        $flag = 'flags/DEF.webp';
    }

    
    echo $cpt,' : ',' <img src="',$flag,'"> ',$data['ville'],' : ';
    
    if($cpt%2==1){
        echo '<b>';
    }
    echo $data['nom'];

    if($cpt%2==1){
        echo '</b>';
    }
    echo '<br>';
    echo $data['description'],' : ',$data['valeur'],'€<br>';

    $req23=$bd->query('SELECT id_type,type FROM type_employe ');

    while($data2 = $req23->fetch()){
        echo '<img heigth=40 width=40 src="images/',$data2['type'],'.webp"> : ';

        $req24=$bd->query('SELECT COUNT(*) as nbr FROM employe WHERE id_hotel='.$data['id_hotel'].' AND id_type='.$data2['id_type'].' AND travaille_encore=1');
        $data3 = $req24->fetch();
        echo $data3['nbr'],' ';


        
    }




    echo '<br>';
    $cpt++;
    
    }*/
    
    






//ex 11 

/*$cpt=1;
while($data = $req11->fetch()){

if (file_exists('flags/'.$data['code'].'.webp')) {
    $flag = 'flags/'.$data['code'].'.webp'; 
    
}
else
{
    $flag = 'flags/DEF.webp';
}
if($cpt%2==1){
    echo '<b>';
}

echo $cpt,' ',$data['ville'],' <img src="',$flag,'"> :',$data['pays'],' : ';

for($i=0;$i<$data['nbr'];$i++){
    echo '<img heigth=40 width=40 src="images/hotel.png">';
}


if($cpt%2==1){
    echo '</b>';
}
echo '<br>';
$cpt++;

}
*/
?>

<form action="index.php" method="post">

<p>nom : <input type="text" name="nom"><br>
<p>prix : <input type="text" name="nom"><br>
<p><select name="ville"><option value="1">Elegant Haven - Hambourg </option></select><br>
<p><select name="ville"><option value="1">Suite </option></select><br>


   <p> <input type="submit" value="ajouter">

</form>

<?php

while($data = $req32->fetch()){
    echo '<b>',$data['nom'],'</b> : ',$data['type'],'<br>';
}

?>


