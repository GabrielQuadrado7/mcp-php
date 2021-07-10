<?php
  include_once "../../includes/cadastroEtapa.php";
?>

<div class="container-xl">
    <div class="row">
        <?php echo($btn)?>
        <h3 class="title">Cadastro Etapa</h3>
    </div>
    <hr class="pb-3">

    <form method="POST">
      <fieldset>
        <div class="form-group">
          <label>Etapa</label>
          <input type="text" id="nomeEtapa" class="form-control" placeholder="Nome da Etapa" required>
          <div id="mensagemDeErro" class="text-danger font-size-3">
          </div>
        </div>
        <button type="button" class="btn btn-success mr-3" onclick="cadastrarEtapa();">Cadastrar</button>
      </fieldset>
      <div id="resultadoInclusao" class="mt-3"></div>
    </form>
    <hr>


    <a class="btn text-info text-decoration-none" data-toggle="modal" data-target="#modalProdutos">
    <img src="../../assets/search.svg" class="mr-2">Ver Etapas</a>

        <div class="modal fade" tabindex="-1" id="modalProdutos">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Etapas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p class="font-weight-bold">Pesquisar Etapas</p>
                    <div class="mb-4">
                      <form>
                        <div class="row">
                          <div class="col">
                            <input type="text-submit" class="form-control" placeholder="Descrição..." id="nomeEtapaPesquisa">
                          </div>
                          <div class="col">
                            <button type="button" class="btn btn-primary" onclick="listEtapas()">Pesquisar</button>
                          </div>
                        </div>
                      </form>
                    </div>

                    <div id="resultadoEtapa""></div>
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