<?php

require_once "../class/PgsqlCommands.class.php";

if(isset($_POST['quantidade']) && isset($_POST['produto']))
{
	$insertRemessaProducao = new PgsqlCommands();
    
    $remessaProducao = array(
        'status' => 'inicializado',
        'produto' => $_POST['produto'],
        'quantidade' => $_POST['quantidade'],
        'observacao' => $_POST['observacao']
    );
         
    $sql = "INSERT INTO remessaproducao(status, quantidade, produto, observacao)
            VALUES (:status, :quantidade, :produto, :observacao)";

	$insertRemessaProducao->select($sql, $remessaProducao);
}

?>
