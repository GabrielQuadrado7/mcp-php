<?php

/**
 * 
 * this file doing the logout of user
 * 
 */
session_start();

session_destroy();

if(is_dir("../../login"))
{
    header("location:../../login");
}
else
{
    header("location:../login"); 
}

?>
