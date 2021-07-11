<?php
include_once "../class/PgsqlCommands.class.php";

// Verifica se existe a variável txtnome
if (isset($_POST["produto"])) {
    
    $produto = $_POST["produto"];

    // Conexao com o banco de dados
    $conn = new PgsqlCommands();


    $produtoPesquisa = array(
        "descricao" => $_POST["produto"] == "" ?  "%" : "%" . $_POST["produto"] . "%",
    );

    if($_POST['grupo'] == "")
    {
        $queryGrupo = ">= 0";
    }
    else
    {
        $produtoPesquisa["grupo"] = $_POST['grupo'];
        $queryGrupo = "= :grupo";
    }

    if($_POST['status'] == "")
    {
        $queryStatus = "LIKE '%'";
    }
    else
    {
        $produtoPesquisa["status"] = strtolower($_POST['status']);
        $queryStatus = "= :status";
    }

    $sql = "SELECT * FROM produto WHERE descricao ILIKE :descricao AND status " . $queryStatus . " AND grupo " . $queryGrupo;
    $result = $conn->select($sql, $produtoPesquisa);

    // Verifica se a consulta retornou linhas
    if (count($result) > 0) {


        // HTML
        ?> 
                    
        <table class='table table-striped table-sm'>
            <thead>
                <tr>
                    <th scope='col'>Código</th>
                    <th scope='col'>Nome</th>
                    <th scope='col'>Grupo</th>
                    <th scope='col'>Status</th>
                    <th>-</th>
                    <th>-</th>
                </tr>
            </thead>
            <tbody>

        <?php
        // HTML

        for($i = 0; $i < count($result); $i++){

            // para retornar o valor do grupo através do id do resultado
            $codigoGrupo = array(
                'codigo' => $result[$i]['grupo']
            );
            $sql = "SELECT nome FROM grupo WHERE codigo = :codigo";
            $grupo = $conn->select($sql, $codigoGrupo);


            // para retornar o valor do grupo através do id do resultado
            $grupoAux = array(
                'codigo' => '%'
            );

            $sql = "SELECT nome, codigo FROM grupo WHERE nome like :codigo";

            $grupoForSelect = $conn->select($sql, $grupoAux);        

            ?> 

            <tr>
                <td>
                    <a class="text-dark" id="codigoProduto<?php echo($result[$i]['codigo']); ?>">
                        <strong class="align-middle">
                            <?php echo($result[$i]['codigo']); ?>
                        </strong>
                    </a>
                </td>
                <td>
                    <input class="form-control" id="nomeInput<?php echo($result[$i]['codigo']); ?>" style="cursor: pointer;" value="<?php echo($result[$i]['descricao']); ?>" disabled>
                </td>
                <td>
                    <select class="form-control" id="grupoSelect<?php echo($result[$i]['codigo']); ?>" disabled>

                        <?php 

                            for($j = 0; $j < count($grupoForSelect); $j++)
                            {
                                    
                                if($result[$i]['grupo'] == $grupoForSelect[$j]['codigo'])
                                {
                                    echo("<option value='{$grupoForSelect[$j]['codigo']}' selected=''>{$grupoForSelect[$j]['nome']}</option>");
                                }
                                else
                                {
                                    echo("<option value='{$grupoForSelect[$j]['codigo']}'>{$grupoForSelect[$j]['nome']}</option>");
                                }
                            }
                        ?>
                        
                    </select>
                </td>
                <td>
                    <select class="form-control" id="statusSelect<?php echo($result[$i]['codigo']); ?>" disabled>
                        <?php 

                            // verifica se o status do produto atual é ativo ou inativo para setar oque irá aparecer primeiro
                            if($result[$i]['status'] == 'ativo')
                            {
                                echo("<option value='ativo'>ativo</option><option value='inativo'>inativo</option>");
                            }
                            else
                            {
                                echo("<option value='inativo'>inativo</option><option value='ativo'>ativo</option>");
                            }

                        ?>
                    </select>
                </td>
                <td>
                    <button class="btn btn-warning" id="botaoEditar<?php echo($result[$i]['codigo']); ?>" title="Editar" style="cursor: pointer;" onclick=editarProduto(<?php echo($result[$i]['codigo']);?>)>
                        <img src="../../assets/pencil-fill.svg">
                    </button>
                </td>
                <td>
                    <button class="btn btn-danger" id="botaoDeletar<?php echo($result[$i]['codigo']); ?>" title="Deletar" style="cursor: pointer;" onclick=deletarProduto(<?php echo($result[$i]['codigo']) ?>)>
                        <img src="../../assets/trash-fill.svg">
                    </button>
                </td>
            </tr>

            <?php
            // HTML
        }
        ?>
            </tbody>
        </table>
    <?php
    }
    else{
        echo("Não foram encontrados registros!");
    }
}
?>