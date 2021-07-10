<?php

require_once "../class/PgsqlCommands.class.php";

if(isset($_POST['nomeGrupo']))
{
	$insertGrupo = new PgsqlCommands();

	$produto = array(
		'nome' => $_POST['nomeGrupo'],
 	);

	$sql = "INSERT INTO grupo(nome) VALUES (:nome)";
	$insertGrupo->select($sql, $produto);
}
?>