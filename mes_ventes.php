<?php

include "config.php";


// Vérifier si l'utilisateur est connecté

if(!isset($_SESSION['id_membre'])){

    header("location:login.php");
    exit;

}


$id_membre = $_SESSION['id_membre'];


// Récupérer les produits du membre connecté

$sql = "

SELECT

pm.id_produit_membre,
p.nom AS produit,
c.nom_categorie,
pm.prix_vente,
pm.quantite_dispo,
pm.date_dispo

FROM produit_membre pm


JOIN produit p
ON pm.id_produit = p.id_produit


JOIN categorie c
ON p.id_categorie = c.id_categorie


WHERE pm.id_membre = $id_membre

";


$result = mysqli_query($conn,$sql);


?>


<h1>Mes produits en vente</h1>



<?php

while($vente = mysqli_fetch_assoc($result)){


?>


<div>


<h3>
<?= $vente['produit'] ?>
</h3>


<p>
Catégorie :
<?= $vente['nom_categorie'] ?>
</p>


<p>
Prix :
<?= $vente['prix_vente'] ?> Ar
</p>


<p>
Quantité disponible :
<?= $vente['quantite_dispo'] ?>
</p>


<p>
Date de disponibilité :
<?= $vente['date_dispo'] ?>
</p>



<a href="modifier_vente.php?id=<?= $vente['id_produit_membre'] ?>">
Modifier
</a>



<a href="supprimer_vente.php?id=<?= $vente['id_produit_membre'] ?>"
onclick="return confirm('Supprimer cette vente ?')">

Supprimer

</a>



</div>


<hr>


<?php

}

?>