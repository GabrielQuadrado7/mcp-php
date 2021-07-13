<?php

require_once "../../class/Session.class.php";
require_once "../../class/LayoutHandler.class.php";
require_once "../../class/PgsqlCommands.class.php";


//create a new Session and call the 'cadastroEtapa' for render in the screen

$sessionVerify = new Session();

$interface = new LayoutHandler();
$interface->setScreen = 'cadastroEtapa';
$interface->getScreen();

?>