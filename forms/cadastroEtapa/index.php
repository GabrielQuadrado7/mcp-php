<?php

include_once "../../class/Session.class.php";
include_once "../../class/LayoutHandler.class.php";
include_once "../../class/PgsqlCommands.class.php";

$sessionVerify = new Session();

$interface = new LayoutHandler();
$interface->setScreen = 'cadastroEtapa';
$interface->getScreen();

?>