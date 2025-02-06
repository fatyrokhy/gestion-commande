<?php
if (isset($_REQUEST["page"])) {
    $page = $_REQUEST["page"];
    if ($page == 'formCommande') {
        global $recherche;
        if (isset($_GET["search_numero"])) {
            $recherche=findClientByTel($_GET["search_numero"]);
            // $_SESSION['client']=$recherche;
        }
        if (isset($_GET["searchbtn1"])) {
            if ($recherche!=null) {
                $_SESSION['commandes']=[];
            }
            
        }

        if (isset($_POST["btnAdd"])) {
            $errors=[];
            isEmpty("article",$errors);
            isEmpty("prix",$errors);
            isEmpty("quantite",$errors);
            if ($recherche ==null) {
                $_SESSION['commandes']=[];
                $errors['msge']="Veuillez sélectionner un client d'abord";
            }
            if (!isset($_SESSION['commandes'])) {
                $_SESSION['commandes'] = [];
            }
            
            if (isset($_GET['edit'])){
                ajoutCommande($_GET['edit'],$_POST["article"],$_POST["prix"],$_POST["quantite"]);
            } else {
                ajoutCommande(null,$_POST["article"],$_POST["prix"],$_POST["quantite"]);
            } 
            // $edit=edit($edit,$_POST["article"],$_POST["prix"],$_POST["quantite"]);
        }
        if (isset($_POST["btnCmd"])) {
            isEmpty("ref",$errors);
            commander($_POST['ref'],"impaye",$recherche[0]['id']);
            unset($_SESSION['commandes']);
        }

        $edit = null;
        if (isset($_GET['edit'])) {
            $id = $_GET['edit'];
            foreach ($_SESSION['commandes'] as $index => $cmd) {
                if ($index == $id) {
                    $edit = $cmd;
                    break;
                }
            }
        }

        if (isset($_GET['index'])) {
            delete($_GET['index']);
        }
     require_once("./views/commande/formCommande.php");
    } else if ($page == 'listeCommande') {
        $commandes = findALLClient('commandes');
        $clients = findALLClient('clients');

        if (isset($_GET['searchbtn1'])) {
            if (!empty($_GET['search_numero'])) {
                $page = 'listeCommande';
                $_GET['controller'] = 'controllerCommande';
                $commandes = findCommandeClientByTel($_GET['search_numero']);
            }
        }
        require_once("./views/commande/listeCommande.php");
    } else if ($page == 'DetailsCommande') {
        $commande = rechercheCommande();
        $produits = findALLClient('produits');
        $cmd = rechercheCommandeById();
        if (isset($_GET['commande'])) {
            $cmd = rechercheCommandeById();
            if (!empty($cmd)) {
                $prod = recherProduit($produits, $cmd[0]['details']);
            }
        }
        require_once("./views/commande/DetailsCommande.html.php");
    }
} else {
    $commandes = findALLClient('commandes');
        $clients = findALLClient('clients');

        if (isset($_GET['searchbtn1'])) {
            if (!empty($_GET['search_numero'])) {
                $page = 'listeCommande';
                $_GET['controller'] = 'controllerCommande';
                $commandes = findCommandeClientByTel($_GET['search_numero']);
            }
        }
    require_once("./views/commande/listeCommande.php");
}
