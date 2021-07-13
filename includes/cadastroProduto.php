<?php

include_once "../../class/PgsqlCommands.class.php";

/**
 * 
 * this part of code load the select with groups from table 'grupo' in database
 * 
 * @var $sql = query in database
 * @var $result = result of query (array)
 * @var $groupOptions = tag <select> that have content of groups
 * 
 */

$conn = new PgsqlCommands();
$sql = "SELECT codigo, nome FROM grupo WHERE nome LIKE :nome";
$result = $conn->select($sql, array('nome' => '%'));

$groupOptions = "";

for($i = 0; $i < count($result); $i++){
    $groupOptions .= "<option value='".$result[$i]['codigo']."'>".$result[$i]['nome']."</option>";
}


/**
 * 
 * this part of code verify if the current page is fav
 * if yes the star turns black
 * if not the star turns black-fill
 * 
 */

$conn = new PgsqlCommands();

/**
 * 
 * @var $ambiente = array with the name of environment
 * @var $sql = query in database
 * @var $return = result of query (array)
 * 
 */

$ambiente = array(
    "nome" => "Cadastro Produto"
);

$sql = "SELECT codigo from favorito where nomeAmbiente = :nome";

$return = $conn->select($sql, $ambiente);

/**
 * 
 * @var $btn = html content of fav star
 * 
 * if $return is equal one the star is black else is white
 * 
 */

if(count($return) == 1)
{
    $btn = '<button class="btn text-muted" id="botao-favoritar" title="adicionar página aos favoritos" onclick="deletarFavorito(`Cadastro Produto`, `/cadastroProduto`)">
                <img src="../../assets/star.svg" id="favorito-star">
            </button>';
}
else
{
    $btn = "<btn class='btn text-muted' id='botao-favoritar' title='adicionar página aos favoritos' onclick='cadastrarFavorito(`Cadastro Produto`, `/cadastroProduto`)'>
                <img src='../../assets/star-fill.svg' id='favorito-star'>
            </btn>";
}

?>