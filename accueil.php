<?php

include_once ( "../inc/functions.php" );


$produits=getProduitsDisponibles();

?>


<h1>IT Vente</h1>


<?php while($p=mysqli_fetch_assoc($produits)){ ?>


<div>

<h3>
<?= $p['produit'] ?>
</h3>


<p>
Categorie :
<?= $p['nom_categorie'] ?>
</p>


<p>
Vendeur :
<?= $p['vendeur'] ?>
</p>


<p>
Prix :
<?= $p['prix_vente'] ?> Ar
</p>


<p>
Stock :
<?= $p['quantite_dispo'] ?>
</p>


<p>
Disponible le :
<?= $p['date_dispo'] ?>
</p>



<form action="acheter.php" method="POST">


<input 
type="hidden"
name="id"
value="<?= $p['id_produit_membre']?>">


<input 
type="number"
name="quantite"
min="1"
max="<?= $p['quantite_dispo']?>">


<button>
Acheter
</button>


</form>


</div>


<hr>


<?php } ?>