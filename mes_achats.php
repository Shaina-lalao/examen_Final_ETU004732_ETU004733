<?php

include "config.php";


$sql="
SELECT 
p.nom,
v.quantite,
v.date,
v.heure

FROM vente v

JOIN produit_membre pm
ON v.id_produit_membre=pm.id_produit_membre

JOIN produit p
ON pm.id_produit=p.id_produit

";


$result=mysqli_query($conn,$sql);



while($a=mysqli_fetch_assoc($result)){


echo $a['nom']." - ";
echo $a['quantite']." - ";
echo $a['date']." ";
echo $a['heure'];

echo "<br>";

}


?>