<?php
session_start();

include_once ( "../inc/functions.php" );

echo $_POST["etu"];

$etu = $_POST["etu"];

if ( !empty ( $etu ) && verifie_etu($etu) ){
    $_SESSION["etu"] = $etu ;
    header("Location:../pages/accueil.php" );
}
else {
    header("Location:../pages/index.php?message=2" );
}

if ( !empty($_SESSION["nom"]) && $inscription = inscription_auto( $etu , $_SESSION["nom"] ))
{
        $_SESSION["etu"] = $etu ;
        header("Location:../pages/accueil.php?" );
}
    
?>