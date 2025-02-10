<?php
require_once("data.php");
$GLOBALS['data'] =  $data;

function findALLClient($key)
{
    return $GLOBALS['data'][$key];
}

function findClientById()
{
    $cli = [];
    $clients = findALLClient('clients');
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

function montantTotalCommande($produits, $details)
{
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
    $cli = [];
    $commande = findALLClient('commandes');
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
    $cmd = [];
    $commande = findALLClient('commandes');
    if (isset($_GET['commande'])) {
        foreach ($commande as  $value) {
            if ($value["id"] == $_GET['commande']) {
                $cmd[] = $value;
            }
        }
    }
    return $cmd;
}

function recherProduit($produits, $details)
{
    $tabProduit = [];
    foreach ($details as $detail) {
        foreach ($produits as $produit) {
            if ($produit["id"] == $detail["id_produit"]) {
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


function findClientByTel($tel)
{
    $datas = findALLClient('clients');
    foreach ($datas as $value) {
        if ($value['tel'] == $tel) {
            return  [$value];
            break;
        }
    }
    return [];
}

function findCommandeClientByTel($numero)
{
    $commande = findALLClient('commandes');
    $clients = findALLClient('clients');
    $cli = [];
    $commandes = [];
    foreach ($clients as $valu) {
        if ($valu['tel'] == $numero) {
            $cli = $valu;
            break;
        }
    }
    if ($cli != null) {
        foreach ($commande as $value) {
            if ($value['id_client'] == $cli['id']) {
                $clients = $cli;
                $commandes[] = $value;
            }
        }
    }
    return $commandes;
}

function isEmpty($name, &$errors)
{
    if (empty(trim($_POST[$name]))) {
        $errors[$name] = ucfirst($name) . " obligatoire*";
    }
}

function pagination($tab, $nbreElementParPage = 5, $p = 1)
{
    $nbreElementTab = count($tab);
    $nbrePage = ceil($nbreElementTab / $nbreElementParPage);
    $debut = ($p - 1) * $nbreElementParPage;
    if ($p < 1 || $p > $nbrePage) {
        return ['data' => [], 'nbrePage' => $nbrePage];
    }

    return [
        'data' => array_slice($tab, $debut, $nbreElementParPage),
        'nbrePage' => $nbrePage
    ];
}

function modifierCommande($id, $article, $prix, $quantite) {
    if (!empty($article) && !empty($prix) && !empty($quantite) && isset($_SESSION['commandes'][$id])) {
        $_SESSION['commandes'][$id] = [
            "article" => $article,
            "prix" => $prix,
            "quantite" => $quantite
        ];
    }
}

function ajoutCommande($article, $prix, $quantite) {
    if (!empty($article) && !empty($prix) && !empty($quantite)) {
    
        
        foreach ($_SESSION['commandes'] as &$cmd) {
            if ($cmd["article"] == $article) {
                $cmd["quantite"] += $quantite; 
                return;
            }
        }

     
        $_SESSION['commandes'][] = [
            "article" => $article,
            "prix" => $prix,
            "quantite" => $quantite
        ];
    }
}


function ajoutCommande1($id, $article, $prix, $quantite)
{

    if (!empty($article) && !empty($prix) && !empty($quantite)) {
        if (!isset($_SESSION['commandes'])) {
            $_SESSION['commandes'] = [];
        }
        foreach ($_SESSION['commandes'] as &$cmd) {
            if ($cmd["article"] == $article) {
                $cmd["quantite"] += $quantite;
                $updated = true;
                break;
            }
        }
        $updated = false;
        if (isset($id)) {
            foreach ($_SESSION['commandes'] as $index => $cmdModif) {

                if ($index == $id) {
                    $_SESSION['commandes'][$index]["article"] = $article;
                    $_SESSION['commandes'][$index]["prix"] = $prix;
                    $_SESSION['commandes'][$index]["quantite"] = $quantite;
                    $updated = true;
                    dd($cmdModif);
                    break;
                }
            }
        }

        if (!$updated) {
            $_SESSION['commandes'][] = [
                "article" => $article,
                "prix" => $prix,
                "quantite" => $quantite
            ];
        }
    }
}




function commander($ref, $statut, $idClient)
{
    global $data;

    $products = &$data["produits"];
    $commandes = &$data["commandes"];
    if (!empty($ref)) {
        foreach ($_SESSION['commandes'] as &$produit) {
            $existe = false;
    
            foreach ($products as $p) {
                if ($p["nom_produit"] == $produit["article"]) {
                    $produit["id_produit"] = $p["id"];
                    $existe = true;
                    break;
                }
            }
    
            if (!$existe) {
                $nouvel_id = count($products) + 1;
                $produit["id_produit"] = $nouvel_id;
    
                $products[] = [
                    "id" => $nouvel_id,
                    "nom_produit" => $produit["article"],
                    "ref" => "abhg6",
                    "prix" => $produit["prix"]
                ];
            }
        }
    
    
        $nouvelle_commande = [
            "id" => count($commandes) + 1,
            "date" => date("d-m-Y"),
            "numero_commande" => $ref,
            "statut" => $statut,
            "montant_paye" => 0,
            "id_client" => $idClient,
            "details" => array_map(fn($p) => ["id_produit" => $p["id_produit"], "quantite" => $p["quantite"]], $_SESSION['commandes'])
        ];
    
        $commandes[] = $nouvelle_commande;
        sauvegarderData($data);    }
    
}
function sauvegarderData($data)
{
    $contenu = "<?php\n\$data = " . var_export($data, true) . ";\n?>";
    file_put_contents('data.php', $contenu);
}

function commander2($ref, $statut, $idClient)
{
    //$products=findALLClient('produits');
    //$com=findALLClient('commandes');
    global $data; // Utilisation de la variable globale $data

    $products = &$data["produits"]; // Référence directe aux produits dans $data
    $com = &$data["commandes"];
    foreach ($_SESSION['commandes'] as  &$produit) {
        $existe = false;


        // Vérifier si le produit est déjà enregistré
        foreach ($products as $p) {
            if ($p["nom_produit"] == $produit["article"]) {
                $produit["id_produit"] = $p["id"]; // Récupérer l'ID existant
                $existe = true;
                break;
            }
        }



        // Si le produit n'existe pas, on le crée
        if (!$existe) {

            $nouvel_id = count($products) + 1;
            $produit["id_produit"] = $nouvel_id;
            //dd($produit);
            dd($GLOBALS['data']['produits']);
            $products[]  = [
                "id" => $nouvel_id,
                "nom_produit" => $produit["article"],
                "ref" => "abhg6",
                "prix" => $produit["prix"]
            ];
        }
    }


    $nouvelle_commande = [
        "id" => count($com) + 1,
        "date" => date("d-m-Y"),
        "numero_commande" => $ref,
        "statut" => $statut,
        "montant_paye" => 0,
        "id_client" => $idClient,
        "details" => array_map(fn($p) => ["id_produit" => $p["id_produit"], "quantite" => $p["quantite"]], $_SESSION['commandes'])
    ];

    // Ajouter la commande
    $com[] = $nouvelle_commande;
}

function edit($id, $article, $prix, $quantite) {}
function totalAmount()
{
    global $total;
    if (!isset($total)) {
        $total = 0;
    }
    $total = 0;
    if (isset($_SESSION['commandes'])) {
        foreach ($_SESSION['commandes'] as $pro) {
            $total += $pro["quantite"] * $pro["prix"];
        }  
      }
    return $total;
}



function delete($id)
{
   
        foreach ($_SESSION['commandes'] as $index => $cmd) {
            if ($index == $id) {
                unset($_SESSION['commandes'][$index]);
                return;
            }
        }
    
}



function dd($val)
{
    echo "<pre>";
    var_dump($val);
    echo "</pre>";
}
