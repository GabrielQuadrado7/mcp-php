<?php

include_once "../../class/Session.class.php";
include_once "../../class/LayoutHandler.class.php";
include_once "../../class/PgsqlCommands.class.php";

//create a new Session and call the 'cadastroProduto' for render in the screen
$sessionVerify = new Session();

$interface = new LayoutHandler();
$interface->setScreen = 'cadastroProduto';
$interface->getScreen();



?>

