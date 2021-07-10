<?php

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
