<?php
session_start();

include_once ( "../inc/functions.php" );

$etu=$_SESSION["etu"];
// echo $etu ;

$produits=getProduitsDisponibles();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/style.css" >
</head>
<body>
    
</body>
<p><img src="../assets/images/Capture d’écran du 2026-07-20 11-20-27.png" width=100px>
<h1 class="text-muted">IT Vente : </h1></p>
<?php while($p=mysqli_fetch_assoc($produits)){ ?>
<div class="container">
    <div class="alert">
        <h3 class="card"><?= $p['produit'] ?></h3>
        <img src="../assets/images/<?php echo $p["image"]; ?>." >
        <p class="text-muted">Categorie :<?= $p['nom_categorie'] ?></p>
        <p class="text-muted">Vendeur :<?= $p['vendeur'] ?></p>
        <p class="text-muted">Prix :<?= $p['prix_vente'] ?> Ar</p>
        <p class="text-muted">Stock : <?= $p['quantite_dispo'] ?></p>
        <p class="text-muted">Disponible le :<?= $p['date_dispo'] ?></p>
        
        <form action="acheter.php" method="POST">
            
            
            <input type="hidden" name="id" value="<?= $p['id_produit_membre']?>">
            <input type="number" name="quantite" required>
            
            <button class="btn"> Acheter</button>
            
        </form>
    </div>
</div>

<hr>
    <?php } ?>
</html>