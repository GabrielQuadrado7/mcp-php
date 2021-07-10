<?php
  include_once "../../includes/cadastroRemessa.php";
?>
<div class="container-xl">
    <div class="row">
        <?php echo($btn)?>
        <h3 class="title">Cadastro Remessa</h3>
    </div>
    <small class="text-muted">Cadastro para remessa de produção</small>
    <hr class="pb-3">
    <form>
        <div class="form-row mx-auto">
            <div class="form-group col-md-6">
                <label class="font-weight-bold">Produto</label>
                <div class="input-group">
                    <input type="number" class="form-control col-2" id="produto-codigo" onkeyup=(setProdutoRemessa(false,true)) tabindex="0">
                    <span class="input-group-btn mr-2">
                        <button class="btn btn-default border rounded-0 bg-light" tabindex="1" title="Pesquisar" type="button" data-toggle="modal" data-target="#modalProduto">
                            <img src="../../assets/search.svg">
                        </button>
                    </span>
                    
                    <input type="text" class="form-control" id="nomeProdutoPesquisaDisable" readonly tabindex="-1">
                    <div class="modal fade" id="modalProduto" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Pesquisar Produtos</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <div class="mb-4">
                                        <form>
                                            <div class="row">
                                            <div class="col">
                                                <input type="text-submit" class="form-control" placeholder="Descrição..." id="nomeProdutoPesquisa">
                                            </div>
                                            <div class="col">
                                                <button type="button" class="btn btn-primary" onclick="listProdutos(true)">Pesquisar</button>
                                            </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div id="resultado">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- modal fade -->   
                </div><!-- input-group -->
                <small id="produto-erro" class="text-danger"></small>
            </div> <!-- form-group -->

            <div class="form-group col-md-2">
                <label class="font-weight-bold" tabindex="2">Quantidade</label>
                <div class="input-group">
                    <input type="number" class="form-control" id="quantidade">
                </div><!-- input-group -->
                <small id="quantidade-erro" class="text-danger"></small>
            </div> <!-- form-group -->

            <div class="form-group col-md-12">
                <label class="">Observação</label>
                <div class="input-group">
                    <textarea type="text" class="form-control" id="observacao" maxlength="128">
                    </textarea>
                </div><!-- input-group -->
                <small id="quantidade-erro" class="text-danger"></small>
            </div> <!-- form-group -->
        </div> <!-- form row -->
        
        <div class="form-row mx-auto pt-3">
            <div class="form-group col-md-2">
                <button type="button" class="btn btn-success" onclick="cadastrarRemessa();">Criar Remessa</button>
            </div>
        </div>

        <div id="resultado-cadastro"></div>
    </form>