<?php
include_once('../inc/functions.php');

$id = isset($_POST['id']) ? $_POST['id'] : 0;
$quantite = isset($_POST['quantite']) ? $_POST['quantite'] : 0;

$succes = acheterProduit($id, $quantite);

if ($succes) {
    echo "Achat réussi !";
} else {
    echo "Erreur : stock insuffisant ou quantité invalide.";
}

echo '<br><a href="accueil.php">Retour</a>';
?>
