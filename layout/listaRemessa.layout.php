<?php
  include_once "../../includes/listaRemessa.php";
?>

<div class="container-xl">
    <div class="row">
        <?php echo($btn)?>
        <h3 class="title">Lista Remessas</h3>
    </div>
    <hr class="pb-3">
    <form>
        <div class="row">
            <div class="col">
                <label>Chave de pesquisa</label>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <input type="text" class="form-control" placeholder="..." id="codigoRemessaProducaoPesquisa"/>
                <small class="text-muted">Pesquise pelo produto ou pelo código da remessa</small>
            </div>
            <div class="col">
                <button type="button" class="btn btn-primary" onclick="listRemessaProducao()">Pesquisar</button>
            </div>
        </div>
    </form>
    <div id="result">
    </div>