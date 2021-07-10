<?php
  include_once "../../includes/listaProduto.php";
?>

<div class="container-xl">
    <div class="row">
        <?php echo($btn)?>
        <h3 class="title">Lista Produtos</h3>
    </div>
    <small class="text-muted">lista de produtos cadastrados</small>
    <hr class="pb-3">
    <div class="mb-4">
        <form>
            <div class="row">
                <div class="col-4">
                    <small class="text-dark">Descrição</small>
                    <input type="text-submit" class="form-control" placeholder="Descrição..." id="nomeProdutoPesquisa">
                </div>
                <div class="col-4">
                    <small class="text-dark">Grupo</small>
                    <select class="form-control" id="grupo">
                        <option value=""></option>
                        <?php echo($groupOptions); ?>
                    </select>
                </div>
                <div class="col-2">
                    <small class="text-dark">Status</small>
                    <select class="form-control" id="status">
                        <option value=""></option>
                        <option value="ativo">Ativo</option>
                        <option value="inativo">Inativo</option>
                    </select>
                </div>
                <div class="col">
                    <br>
                    <button type="button" class="btn btn-primary" onclick="listProdutos()">Pesquisar</button>
                </div>
            </div>
        </form>
    </div>
    <div id="resultado">
    
    </div>