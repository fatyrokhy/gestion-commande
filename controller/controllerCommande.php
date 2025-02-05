<?php
if (isset($_REQUEST["page"])) {
    $page = $_REQUEST["page"];
    if ($page == 'formCommande') {
        // require_once("./views/commande/formCommande.php");

        if (isset($_GET["search_numero"])) {
            $recherche=findClientByTel($_GET["search_numero"]);
            $_SESSION['client']=$recherche;

        }
        if (isset($_POST["btnAdd"])) {
            $errors=[];
            isEmpty("article",$errors);
            if (!isset($_SESSION['commandes'])) {
                $_SESSION['commandes'] = [];
            }
            $total = ajoutCommande($_POST["article"],$_POST["prix"],$_POST["quantite"]);
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
