<?php

require_once "../class/PgsqlCommands.class.php";

if(isset($_POST['grupoProduto']) && isset($_POST['nomeProduto']) && isset($_POST['statusProduto']))
{
	$insertProdutos = new PgsqlCommands();

	$produto = array(
		'descricao' => $_POST['nomeProduto'],
		'grupo' => $_POST['grupoProduto'],
		'status' => $_POST['statusProduto']
 	);

	$sql = "INSERT INTO produto(descricao, grupo, status) VALUES (:descricao, :grupo, :status)";
	$insertProdutos->select($sql, $produto);

}
?>