<?php


if(
    $_POST['name'] != "" && $_POST['name'] != null
)
{

    include_once "../class/PgsqlCommands.class.php";

    $conn = new PgsqlCommands();

    $fav = array(
        "name" => $_POST['name']
    );

    $sql = "DELETE FROM favorito WHERE nomeambiente = :name";

    $conn->select($sql, $fav);

}

?>