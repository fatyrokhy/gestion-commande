<?php
require_once("data.php");
$GLOBALS['data'] =  $data;  

function findALLClient($key) {
    return $GLOBALS['data'][$key]; 
}

function findClientById() {
    $cli=[];
    $clients=findALLClient('clients');
    if (isset($_GET['client'])) {
        foreach ($clients as  $value) {
            if ($value["id"] == $_GET['client']) {
                $cli = $value;
                break;
            }
        }
    }
    return $cli;

}

function montantTotalCommande($produits, $details) {
    $total = 0;
    foreach ($details as $detail) {
        foreach ($produits as $produit) {
            if ($produit["id"] == $detail["id_produit"]) {
                $total += $produit["prix"] * $detail["quantite"];
            }
        }
    }
    return $total;
}

function rechercheCommande()
{
    $cli=[];
    $commande=findALLClient('commandes');
    if (isset($_GET['client'])) {
        foreach ($commande as  $value) {
            if ($value["id_client"] == $_GET['client']) {
                $cli[] = $value;
            }
        }
    }
    return $cli;
}

function rechercheCommandeById()
{
    $cmd=[];
    $commande=findALLClient('commandes');
    if (isset($_GET['commande'])) {
        foreach ($commande as  $value) {
            if ($value["id"] == $_GET['commande']) {
                $cmd[] = $value;
            }
        }
    }
    return $cmd;
}

function recherProduit($produits, $details) {
    $tabProduit = [];
    foreach ($details as $detail) {
        foreach ($produits as $produit) {
            if ($produit["id"] == $detail["id_produit"] ) {
                $tabProduit[] = [
                    "nom_produit" => $produit["nom_produit"],
                    "prix" => $produit["prix"],
                    "quantite" => $detail["quantite"]
                ];
            
            }
        }
    }
    return $tabProduit;
}


function findClientByTel($tel) {
    $datas=findALLClient('clients');
    foreach ($datas as $value) {
        if ($value['tel']==$tel) {
            return  [$value] ;
        }
    }
    return [];
}
 
function findCommandeClientByTel($numero) {
    $commande=findALLClient('commandes');
    $clients=findALLClient('clients');
    $cli=[];
    $commandes=[];
    foreach ($clients as $valu) {
        if ($valu['tel']==$numero) {
             $cli=$valu ;
            break;
        } 
    }
    if ($cli != null) {
        foreach ($commande as $value) {
            if ($value['id_client']==$cli['id']) {
                $clients=$cli;
                $commandes[]= $value;
            }
        } 
    }
    return $commandes;
    
}

function pagination($tab,$nbreElementParPage=5,$p=1){
    $nbreElementTab=count($tab);
    $nbrePage=ceil($nbreElementTab/$nbreElementParPage);
    $debut=($p-1)* $nbreElementParPage;
    if ($p < 1 || $p > $nbrePage) {
        return ['data' => [], 'nbrePage' => $nbrePage];
    }

    return [
        'data' => array_slice($tab, $debut, $nbreElementParPage),
        'nbrePage' => $nbrePage
    ];
}

function dd($val){
    echo "<pre>";
        var_dump($val);
    echo "</pre>";
}
?>