<?php
require_once("../model.php");
define('PAGE','http://faty.niass.ecole221.sn:8000/?');

if (isset($_GET["controller"])) {
    $controller=$_GET["controller"];
    if ($controller=="controllerClient") {
        require_once("../controller/controllerClient.php");
    }
} else {
    require_once("../controller/controllerClient.php");
}