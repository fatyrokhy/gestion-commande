<?php
session_start();
require_once("model.php");
define('PAGE','http://faty.niass.ecole221.sn:8000/?');
if (isset($_REQUEST["controller"])) {
    $controller=$_REQUEST["controller"];
    if ($controller=="controllerClient") {
        require_once("./controller/controllerClient.php");
    }  else if ($controller=="controllerCommande") {
        require_once("./controller/controllerCommande.php");
    }
} else {
    require_once("./controller/controllerClient.php");
}