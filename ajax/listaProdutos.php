<?php
include_once "../class/PgsqlCommands.class.php";

// Verifica se existe a variável txtnome
if (isset($_GET["produto"])) {
    
    $produto = $_GET["produto"];

    // Conexao com o banco de dados
    $conn = new PgsqlCommands();

    // verifica se a opção de select existe, senão ele apenas exibe a tabela normal
    if(isset($_GET['select']) && $_GET['select'] == 'select')
    {
        $produtoPesquisa = array(
            "descricao" => $_GET["produto"] == "" ?  "%" : "%" . $_GET["produto"] . "%",
        );

        if($_GET['grupo'] == "")
        {
            $queryGrupo = ">= 0";
        }
        else
        {
            $produtoPesquisa["grupo"] = $_GET['grupo'];
            $queryGrupo = "= :grupo";
        }

        if($_GET['status'] == "")
        {
            $queryStatus = "LIKE '%'";
        }
        else
        {
            $produtoPesquisa["status"] = strtolower($_GET['status']);
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

                // HTML

                // para retornar o valor do grupo através do id do resultado
                $grupoAux = array(
                    'codigo' => '%'
                );

                $sql = "SELECT nome, codigo FROM grupo WHERE nome like :codigo";

                $grupoForSelect = $conn->select($sql, $grupoAux);        

                ?> 

                <tr>
                    <td>
                        <a class="text-dark">
                            <strong>
                                <?php echo($result[$i]['codigo']); ?>
                            </strong>

                        </a>
                    </td>
                    <td>
                        <input class="form-control" id="nomeInput<?php echo($i);?>" style="cursor: pointer;" value="<?php echo($result[$i]['descricao']); ?>" disabled>
                    </td>
                    <td>
                        <select class="form-control" disabled>

                            <?php 

                                for($j = 0; $j < count($grupoForSelect); $j++)
                                {
                                    
                                    if($result[$i]['grupo'] == $grupoForSelect[$j]['codigo'])
                                    {
                                        echo("<option value='{$grupoForSelect[$j]['codigo']}' selected='selected'>{$grupoForSelect[$j]['nome']}</option>");
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
                        <select class="form-control" disabled>
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
                        <button class="btn btn-warning" title="Editar" style="cursor: pointer;" onclick=editarProduto(<?php echo($i)?>)>
                            <img src="../../assets/pencil-fill.svg">
                        </button>
                    </td>
                    <td>
                        <button class="btn btn-danger" title="Deletar" style="cursor: pointer;">
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
        // HTML
        } else {
            // Se a consulta não retornar nenhum valor, exibi mensagem para o usuário
            echo "Não foram encontrados registros!";
        }
    }
}
?>