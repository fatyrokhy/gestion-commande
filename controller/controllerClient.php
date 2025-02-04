<?php
require_once('./model.php');
 

if (isset($_REQUEST["page"])) {
    $page = $_REQUEST["page"];
    if ($page=='formclient') {
        require_once("./views/client/formclient.html.php");
    } else if ($page=='listeclient') {
        $clients=findALLClient('clients');
        if (isset($_GET['search_tel'])) {
            $clients=findClientByTel($_GET['search_tel']);
         }
        require_once("./views/client/listeclient.html.php");
    }
} else {
    $clients=findALLClient('clients');
    if (isset($_GET['search_tel'])) {
        $clients=findClientByTel($_GET['search_tel']);
     }
    require_once("./views/client/listeclient.html.php");
    } 

