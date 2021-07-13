<?php

include_once "../../class/Session.class.php";
include_once "../../class/LayoutHandler.class.php";

//create a new Session and call the 'listaRemessa' for render in the screen
$sessionVerify = new Session();

$interface = new LayoutHandler();
$interface->setScreen = 'listaRemessa';
$interface->getScreen();


?>

