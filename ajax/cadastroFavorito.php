<?php


if(
    $_POST['name'] != "" && $_POST['name'] != null &&
    $_POST['path'] != "" && $_POST['path'] != null
)
{

    include_once "../class/PgsqlCommands.class.php";

    $conn = new PgsqlCommands();

    $fav = array(
        "path" => $_POST['path'],
        "name" => $_POST['name']
    );

    $sql = "INSERT INTO favorito(nomeAmbiente, caminhoAmbiente) VALUES (:name, :path)";

    $conn->select($sql, $fav);

}

?>