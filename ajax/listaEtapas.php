<?php
include_once "../class/PgsqlCommands.class.php";

// Verifica se existe a variável txtnome
if (isset($_GET["nomeEtapaPesquisa"])) {
    $etapa = $_GET["nomeEtapaPesquisa"];

    // Conexao com o banco de dados
    $conn = new PgsqlCommands();

    // Verifica se a variável está vazia
    if (empty($etapa) || $etapa = "") 
    {
        $sql = "SELECT * FROM etapa";
        $etapa = array("etapa" => "%");
        $result = $conn->select($sql, array());
    } 
    else 
    {
        $nomeBusca  = "%" . $_GET["nomeEtapaPesquisa"];
        $nomeBusca .= "%";
        $etapa = array("etapa" => $nomeBusca);
        $sql = "SELECT * FROM etapa WHERE nome ILIKE :etapa";
        $result = $conn->select($sql, $etapa);
    }

    
    if(isset($_GET['select']) && $_GET['select'] == 'select')
    {
        // Verifica se a consulta retornou linhas
        if (count($result) > 0) 
        {
            // Atribui o código HTML para montar uma tabela
            $tabela = "<table class='table table-striped table-sm'>
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
                $return.= "<td><a class='text-link-select' id='select-link' style='cursor: pointer;};' onclick='(setEtapaRemessa(" . $result[$i]['codigo'] . "))'>" . $result[$i]['codigo'] . "</td>";
                $return.= "<td><a class='text-link-select' id='select-link' style='cursor: pointer;};' onclick='(setEtapaRemessa(" . $result[$i]['codigo'] . "))'>" . $result[$i]['nome'] . "</td>";
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
    else {
        // Verifica se a consulta retornou linhas
        if (count($result) > 0) 
        {
            // Atribui o código HTML para montar uma tabela
            $tabela = "<table class='table table-striped table-sm'>
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
    
}
?>