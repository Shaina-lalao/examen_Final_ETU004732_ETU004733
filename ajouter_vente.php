<?php

include "config.php";


if(isset($_POST['ajouter'])){


$id_produit=$_POST['produit'];
$prix=$_POST['prix'];
$qte=$_POST['quantite'];
$date=$_POST['date'];


$id_membre=$_SESSION['id_membre'];



$sql="
INSERT INTO produit_membre

(id_produit,id_membre,prix_vente,quantite_dispo,date_dispo)

VALUES

('$id_produit','$id_membre','$prix','$qte','$date')
";


mysqli_query($conn,$sql);


echo "Produit ajouté";

}


?>