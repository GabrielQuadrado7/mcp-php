<?php
  include_once "../../includes/cadastroProduto.php";
?>

<div class="container-xl">
    <div class="row">
        <?php echo($btn)?>
        <h3 class="title">Cadastro Produto</h3>
    </div>
    <hr class="pb-3">
    <form method="POST">
      <fieldset>
        <div class="form-group">
          <label>Produto</label>
          <input type="text" id="nomeProduto" class="form-control" placeholder="Nome do Produto" required>
          <div id="mensagemDeErroNomeProduto" class="text-danger"></div>
        </div>
        <div class="form-group">
          <label >Grupo</label>
          <select id="grupoProduto" class="form-control" required>
            <option></option>
            <?php echo($groupOptions);?>
          </select>
          <div id="mensagemDeErroNomeGrupo" class="text-danger"></div>
        </div>

        <div class="form-group">
          <label>Status</label>
          <select id="statusProduto" class="form-control" required>
            <option value="ativo">ativo</option>
            <option value="inativo">inativo</option>
          </select>
          <div id="mensagemDeErroStatus" class="text-danger"></div>
        </div>
        <button type="button" class="btn btn-success mr-3" onclick="cadastrarProduto();">Cadastrar</button>
      </fieldset>
      <div id="resultadoInclusao" class="mt-3"></div>
    </form>
    <hr>


    <a class="btn text-info text-decoration-none" data-toggle="modal" data-target="#modalProdutos">
    <img src="../../assets/search.svg" class="mr-2">Ver produtos</a>

        <div class="modal fade" tabindex="-1" id="modalProdutos">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Produtos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p class="font-weight-bold">Pesquisar Produtos</p>
                    <div class="mb-4">
                      <form>
                        <div class="row">
                          <div class="col">
                            <input type="text-submit" class="form-control" placeholder="Descrição..." id="nomeProdutoPesquisa">
                          </div>
                          <div class="col">
                            <button type="button" class="btn btn-primary" onclick="listProdutos()">Pesquisar</button>
                          </div>
                        </div>
                      </form>
                    </div>

                    <div id="resultado" onload="listProdutos()"></div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                  </div>
                </div>
            </div>
        </div>

  <!-- para impedir o reenvio de formulario -->
  <script>
    if(window.history.replaceState){
      window.history.replaceState( null, null, window.location.href );
    }
  </script>