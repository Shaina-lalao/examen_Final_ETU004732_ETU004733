<?php

function dbconnect()
{
    static $connect = null;
    if ($connect === null) {
        $connect = mysqli_connect('localhost', 'root', '', 'IT_vente');

        if (!$connect) {
            die('erreur de connection a la base de donnees : ' . mysqli_connect_error());
        }

        mysqli_set_charset($connect, 'utf8mb4');
    }
    return $connect;
}

function get_all_lines($sql)
{
    //echo $sql;
    $req = mysqli_query(dbconnect(),$sql );
    if (!$req) {
        die('Erreur SQL : ' . mysqli_error(dbconnect()));
    }
    $result = array();
    while ($line = mysqli_fetch_assoc($req)) {
        $result[] = $line;
    }
    mysqli_free_result($req);
    return $result;
}

function get_one_line($sql)
{
    $req = mysqli_query(dbconnect(),$sql );
    if (!$req) {
        die('Erreur SQL : ' . mysqli_error(dbconnect()));
    }
    $result = mysqli_fetch_assoc($req);
    mysqli_free_result($req);
    return $result;
}

function execute_query($sql)
{
    $req = mysqli_query(dbconnect(), $sql);
    if (!$req) {
        die('Erreur SQL : ' . mysqli_error(dbconnect()));
    }
    return $req;
}


function verifie_etu($etu)
{
    $sql = "SELECT * FROM membre WHERE numero_etu = '$etu'";
    $nouv_requet = mysqli_query(dbconnect(), $sql);
    $result = mysqli_fetch_assoc($nouv_requet);

    mysqli_free_result($nouv_requet);

    if ($result) {
        return true;
    }

    return false;
}

function inscription_auto ( $etu , $nom )
{
    $inscription = "INSERT INTO membre ( nom , numero_etu ) VALUES ( '$nom' , '$etu' )";
    return mysqli_query(dbconnect(), $inscription);
}

function getProduitsDisponibles(){

    $sql = "
    SELECT 
        pm.id_produit_membre,
        p.nom AS produit,
        c.nom_categorie,
        m.nom AS vendeur,
        pm.prix_vente,
        pm.quantite_dispo,
        pm.date_dispo
    FROM produit_membre pm

    JOIN produit p 
    ON pm.id_produit = p.id_produit

    JOIN categorie c
    ON p.id_categorie = c.id_categorie

    JOIN membre m
    ON pm.id_membre = m.id_membre

    WHERE pm.quantite_dispo > 0
    ";

    return mysqli_query(dbconnect(),$sql);
}



function acheterProduit($id,$quantite){

    $sql = "SELECT quantite_dispo
    FROM produit_membre
    WHERE id_produit_membre=$id
    ";

    $result= execute_query($sql);
    mysqli_fetch_assoc( $result);

    if($quantite <=0){
        return false;
    }

    if($quantite > $produit['quantite_dispo']){
        return false;
    }

    $date=date("Y-m-d");
    $heure=date("H:i:s");


    mysqli_query("INSERT INTO vente (date,heure,id_produit_membre,quantite) VALUES ('$date','$heure','$id','$quantite')");

    mysqli_query("UPDATE produit_membre SET quantite_dispo = quantite_dispo-$quantite WHERE id_produit_membre=$id");


    return true;

}
?>