<?php

include_once "../../class/Session.class.php";
include_once "../../class/LayoutHandler.class.php";

//create a new Session and call the 'main' for render in the screen

$sessionVerify = new Session();

$interface = new LayoutHandler();
$interface->setScreen = 'main';
$interface->getScreen();

?>