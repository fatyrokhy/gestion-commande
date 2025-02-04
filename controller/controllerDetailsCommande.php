<?php
require_once("./model.php");

$commande=rechercheCommande();

$produits=findALLClient('produits');


$cmd=rechercheCommandeById();
if (isset($_GET['commande'])) {
    $cmd=rechercheCommandeById();
    if (!empty($cmd)) {
        $prod=recherProduit($produits,$cmd[0]['details']);
    }
 }
 require_once("./views/commande/DetailsCommande.html.php");
