<?php
include_once "../class/PgsqlCommands.class.php";

// Verifica se existe a variável txtnome
if (isset($_POST["codigo"])) {
    $codigo = $_POST["codigo"];

    // Conexao com o banco de dados
    $conn = new PgsqlCommands();

    // Verifica se a variável está vazia
    if (empty($codigo) || $codigo = "") 
    {
        $sql = "SELECT * FROM remessaproducao WHERE codigo > :numero";
        $result = $conn->select($sql, array("numero" => 0));
    } 
    else 
    {
        $codigo = $_POST['codigo'];

        if(is_numeric($codigo))
        {
            $codigoPesquisa = array("codigo" => $_POST["codigo"]);
            $sql = "SELECT * FROM remessaproducao WHERE codigo = :codigo";
            $result = $conn->select($sql, $codigoPesquisa);
        }
        else
        {
            $produtoPesquisa = array("descricao" => "%" . $_POST["codigo"] . "%");
            $sql = "SELECT codigo FROM produto WHERE descricao LIKE :descricao";
            $produtoFilter = $conn->select($sql, $produtoPesquisa);

            try
            {
                if(count($produtoFilter) == 1)
                {
                    $codigoPesquisa = array("codigo" => $produtoFilter[0]['codigo']);
                    $sql = "SELECT * FROM remessaproducao WHERE produto = :codigo";
                    $result = $conn->select($sql, $codigoPesquisa);
                }
                else
                {
                    echo('<p class="mt-5 text-muted align-center"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="black" class="bi bi-emoji-frown" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M4.285 12.433a.5.5 0 0 0 .683-.183A3.498 3.498 0 0 1 8 10.5c1.295 0 2.426.703 3.032 1.75a.5.5 0 0 0 .866-.5A4.498 4.498 0 0 0 8 9.5a4.5 4.5 0 0 0-3.898 2.25.5.5 0 0 0 .183.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z"/>
                    </svg> Não foi encontrado nenhum registro com base na pesquisa.</p>' );
                    exit;
                }
            }
            catch(Expection $e)
            {
                //
            }
        }

        
    }

    // Verifica se a consulta retornou linhas
    if (count($result) == "" || count($result) == 0) 
    {
        echo('<p class="mt-5 text-muted align-center"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="black" class="bi bi-emoji-frown" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
            <path d="M4.285 12.433a.5.5 0 0 0 .683-.183A3.498 3.498 0 0 1 8 10.5c1.295 0 2.426.703 3.032 1.75a.5.5 0 0 0 .866-.5A4.498 4.498 0 0 0 8 9.5a4.5 4.5 0 0 0-3.898 2.25.5.5 0 0 0 .183.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z"/>
            </svg> Não foi encontrado nenhum registro com base na pesquisa.</p>' );
    } 
    else 
    {
        for($i = 0; $i < count($result); $i++)
        {
            $sql = "SELECT descricao FROM produto WHERE codigo = :codigo";
            $produto = $conn->select($sql, array("codigo" => $result[$i]["produto"]));

            ?>
                <div class="card mt-3">
                    <div class="card-header">
                        <strong>Remessa: <?php echo($result[$i]["codigo"]); ?></strong>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-muted">Produto: <strong><?php echo($produto[0]["descricao"]); ?></strong></h5>
                        <p class="card-text"><strong>Quantidade: </strong><?php echo($result[$i]["quantidade"]); ?></p>
                        <p class="card-text"><strong>Status: </strong><?php echo($result[$i]["status"]); ?></p>
                        <p class="card-text"><strong>Etapa: </strong><?php echo($result[$i]["etapa"]); ?></p>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalRemessaProduto<?php echo($i);?>">Administrar</button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalDeletarRemessaProduto<?php echo($i);?>">Deletar</button>
                    </div>

                    <!-- Modal para visualizar a remessa de produtos -->
                    <div class="modal fade" id="modalRemessaProduto<?php echo($i);?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">
                                    Remessa: <?php echo($result[$i]["codigo"]); ?>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h5 class="card-title text-muted">Produto: <strong><?php echo($produto[0]["descricao"]); ?></strong></h5>
                                <hr>
                                <label class="card-text">Quantidade:</label>
                                <input class="form-control" value="<?php echo($result[$i]["quantidade"]); ?>" id="quantidade<?php echo($result[$i]["codigo"]); ?>">
                                <label class="card-text mt-3">Status:</label>
                                <select class="form-control" id="status<?php echo($result[$i]["codigo"]); ?>">
                                    <option value="Inicializado">Inicializado</option>
                                    <option value="Em progresso">Em progresso</option>
                                    <option value="Finalizado">Finalizado</option>
                                </select>
                                <label class="card-text mt-3">Etapa:</label>
                                <select class="form-control" id="etapa<?php echo($result[$i]["codigo"]); ?>">
                                    <?php

                                        $connSecondary = new PgsqlCommands();
                                        $sql = "SELECT * FROM etapa WHERE nome LIKE :nome";
                                        $grupo = $connSecondary->select($sql, array("nome" => "%"));

                                        for($j = 0; $j < count($grupo); $j++)
                                        {
                                            echo("<option value='" . $grupo[$j]["codigo"] . "'>" . $grupo[$j]["nome"] . "</option>");
                                        }
                                        
                                    ?>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Sair</button>
                                <button type="button" class="btn btn-primary" onclick="updateRemessaProducao(<?php echo($result[$i]['codigo']); ?>, <?php echo($i); ?>)">
                                    Salvar Alterações
                                </button>
                            </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal para visualizar a remessa de produtos -->
                    <div class="modal fade" id="modalDeletarRemessaProduto<?php echo($i);?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">
                                    Deseja deletar a remessa: <?php echo($result[$i]["codigo"]); ?> ?
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                sim, não
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
        }
            
    }  
}
?>