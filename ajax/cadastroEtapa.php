<?php

require_once "../class/PgsqlCommands.class.php";

if(isset($_POST['nomeEtapa']))
{
	$insertEtapa = new PgsqlCommands();

	$produto = array(
		'nome' => $_POST['nomeEtapa'],
 	);

	$sql = "INSERT INTO etapa(nome) VALUES (:nome)";
	$insertEtapa->select($sql, $produto);

}
?>