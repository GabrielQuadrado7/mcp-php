<?php
include_once "../class/PgsqlCommands.class.php";

// Verifica se existe a variável txtnome
if (isset($_GET["codigo"])) {
    $codigo = $_GET["codigo"];

    if($codigo == "")
    {
        echo("");
    }
    else {
        // Conexao com o banco de dados
        $conn = new PgsqlCommands();

        // Verifica se a variável está vazia
        if (!empty($codigo) || $codigo != "") 
        {
            $sql = "SELECT descricao FROM produto WHERE codigo = :codigo AND status = 'ativo'";
            $codigoArray = array("codigo" => $_GET["codigo"]);
            $result = $conn->select($sql, $codigoArray);
        } 
    
        // Verifica se a consulta retornou linhas
        if (count($result) > 0 && $result != "") 
        {
            echo $result[0]['descricao'];
        } 
        else 
        {
            if( $codigo != "")
            {
                echo "Produto inexistente";
            }else {
                // Se a consulta não retornar nenhum valor, exibi mensagem para o usuário
                echo "Não foram encontrados registros!";
            }

        }
    }
}
?>