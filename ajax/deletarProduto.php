<?php

// verifica se o código existe
if(
    $_POST['codigo'] != "" && $_POST['codigo'] != null
)
{

    include_once "../class/PgsqlCommands.class.php";

    $conn = new PgsqlCommands();

    /*
    *
    * aqui vai verificar se existe alguma remessa com o produto passado
    * caso exista vai retornar um json com as remessas
    * caso não exista vai deletar o produto e retornar um json vazio
    *
    */

    $sql = "SELECT codigo FROM remessaproducao WHERE produto = :produto";

    $produto = array(
        "produto" => $_POST['codigo']
    );

    $verificarRemessa = $conn->select($sql, $produto);

    if(count($verificarRemessa) > 0)
    {
        echo(json_encode($verificarRemessa));
    }
    else
    {
        $sql = "DELETE FROM produto WHERE codigo = :codigo";

        $produto = array(
            "codigo" => $_POST['codigo']
        );

        $conn->select($sql, $produto);

        echo(json_encode(array()));
    }

}

?>