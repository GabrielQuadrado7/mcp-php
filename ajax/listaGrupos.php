<?php
include_once "../class/PgsqlCommands.class.php";

// Verifica se existe a variável txtnome
if (isset($_GET["nomeGrupoPesquisa"])) {
    $nome = $_GET["nomeGrupoPesquisa"];

    // Conexao com o banco de dados
    $conn = new PgsqlCommands();

    // Verifica se a variável está vazia
    if (empty($nome) || $nome = "") 
    {
        $sql = "SELECT * FROM grupo";
        $nome = array("nome" => "%");
        $sql = "SELECT * FROM grupo";
        $result = $conn->select($sql, array());
    } 
    else 
    {
        $nomeBusca  = "%" . $_GET["nomeGrupoPesquisa"];
        $nomeBusca .= "%";
        $nome = array("nome" => $nomeBusca);
        $sql = "SELECT * FROM grupo WHERE nome ILIKE :nome";
        $result = $conn->select($sql, $nome);
    }

    
    // Verifica se a consulta retornou linhas
    if (count($result) > 0) 
    {
        // Atribui o código HTML para montar uma tabela
        $tabela = "<table class='table table-striped table-sm' id='table-scroll'>
                    <thead>
                        <tr>
                            <th scope='col'>Código</th>
                            <th scope='col'>Nome</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>";
        $return = "$tabela";


        for($i = 0; $i < count($result); $i++)
        {

            $codigoGrupo = array(
                'codigo' => $_GET["nomeGrupoPesquisa"]
            );

            $sql = "SELECT nome FROM grupo WHERE codigo = :codigo";
            $grupo = $conn->select($sql, $codigoGrupo);

            $return.= "<td>" . $result[$i]['codigo'] . "</td>";
            $return.= "<td>" . $result[$i]['nome'] . "</td>";
            $return.= "</tr>";
        }

        echo $return.="</tbody></table>";
    } 
    else 
    {
        // Se a consulta não retornar nenhum valor, exibi mensagem para o usuário
        echo "Não foram encontrados registros!";
    }
}
?>