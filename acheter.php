<?php
include_once ( "../inc/functions.php" );


$id=$_POST['id'];
$quantite=$_POST['quantite'];


$result=acheterProduit($id,$quantite);


if($result){

echo "Achat réussi";

}else{

echo "Erreur : stock insuffisant";

}


echo "<br><a href='index.php'>Retour</a>";

?>