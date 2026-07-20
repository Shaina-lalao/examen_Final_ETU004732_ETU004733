<?php
session_start();

include_once ( "../inc/functions.php" );

if ( isset($_GET["message"]) ){
    if ( $_GET["message"] == 1 ){
        $message = "Coucou " ;
    }
    if ( $_GET["message"] == 2 ){
        $message = "Nous n'arrivons pas a trouve votre ETU, mais nous allons vous inscrire automatiquement." ;
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion au site</title>
    <link rel="stylesheet" href="../assets/css/style.css" >
</head>
<body class="auth-page">

    <h1><b>Connexion</b></h1>

    <?php if ( isset( $message ) ) {
        echo $message ;    
    }?>
    <form action="../inc/traitement_login.php" method="post">
        <label for="etu" >ETU :</label>
        <input type="etu" id="etu" name="etu" 
        <?php if ( isset($message) && $_GET["message"] == 2 ){ ?>
            value="<?php echo $_SESSION["etu"]; ?>"
        <?php } ?>
        required>
        
        <?php if ( isset($message) ){
            if ( $_GET["message"] == 2 ){ ?>

                <p><label for="nom">Nom :</label>
                <input type="nom" id="nom" name="nom" required></p>
                <?php } ?>
                <?php } ?>
        <p><input type="submit" value="Se connecter"></p>

    </form>
</body>
</html>