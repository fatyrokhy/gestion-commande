<?php
if (isset($_REQUEST["page"])) {
    $page = $_REQUEST["page"];
    if ($page == 'formCommande') {
        global $errors;
        $errors=[];
        if (!isset($_SESSION['commandes'])) {
            $_SESSION['commandes'] = [];
        }
        global $recherche;
        if (isset($_GET["search_numero"])) {
            $recherche=findClientByTel($_GET["search_numero"]);
            if ($recherche!=null) {
                if (isset($_SESSION['client']) && count($_SESSION['client'])) {
                    if ($recherche[0]['id'] != $_SESSION['client'][0]['id']) {
                        unset($_SESSION['commandes']);
                        $_SESSION['commandes'] = [];
                    }
                }
                
                $_SESSION['client']=$recherche;
            
                unset($_GET["search_numero"]);
            }
            else{
                $errors=[];
                unset($_SESSION['commandes']);
                $_SESSION['commandes'] = [];
                unset($_SESSION['client']);
                $_SESSION['client'] = [];
                $errors['nom']= "Aucun client trouvé avec ce numero";
            }
          
        } else { 
            unset($_SESSION['commandes']);
            $_SESSION['commandes'] = [];
            unset($_SESSION['client']);
            $_SESSION['client'] = [];
        }

        if (isset($_POST["btnAdd"])) {
            isEmpty("article",$errors);
            isEmpty("prix",$errors);
            isEmpty("quantite",$errors);
            dd($_SESSION['client']);
            if (isset($_SESSION['client']) && count($_SESSION['client'])==0 ) {
                $errors['msge'] = "Veuillez sélectionner un client d'abord";
                unset($_SESSION['commandes']);
                $_SESSION['commandes'] = [];
            } else {
                ajoutCommande($_POST["article"],$_POST["prix"],$_POST["quantite"]);
            }
        }
        
        if (isset($_POST["btnCmd"])) {
            isEmpty("ref",$errors);
            if (isset($_SESSION["commandes"]) && count($_SESSION["commandes"])<1) {
                $errors["msge1"]="Choisissez vos produits d'abord";
            } else {
                commander($_POST['ref'],"impaye",$recherche[0]['id']);
                header('Location: ' . PAGE . 'controller=controllerCommande&page=listeCommande');
                exit();
                        }
        }

        $edit = null;
        if (isset($_SESSION['client'])  && count($_SESSION['client'])>0) {
            if (isset($_GET['edit'])) {
            $id = $_GET['edit'];
            foreach ($_SESSION['commandes'] as $index => $cmd) {
                if ($index == $id) {
                    $edit = $cmd;
                    break;
                }
            }
           
            modifierCommande($_GET['edit'],$_POST["article"],$_POST["prix"],$_POST["quantite"]);
        }
    }
        if (isset($_GET['index'])) {          
            delete($_GET['index']);
        }
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
