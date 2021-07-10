<?php

include_once "../../class/Session.class.php";
include_once "../../class/LayoutHandler.class.php";

$sessionVerify = new Session();
$interface = new LayoutHandler();
$interface->setScreen = 'listaRemessa';
$interface->getScreen();


?>

