<?php


// COMEÇO DO CÓDIGO QUE VERIFICA SE A PAǴINA ESTÁ NOS FAVORITOS
// SE ESTIVER A ESTRELA FICA PRETA, SENÃO FICA BRANCA
include_once "../../class/PgsqlCommands.class.php";

$conn = new PgsqlCommands();

$ambiente = array(
    "nome" => "Lista Produto"
);

$sql = "SELECT codigo from favorito where nomeAmbiente = :nome";

$return = $conn->select($sql, $ambiente);

if(count($return) == 1)
{
    $btn = '<button class="btn text-muted" id="botao-favotirar" title="adicionar página aos favoritos" onclick="deletarFavorito(`Lista Produto`, `/listaProduto`)">
                <img src="../../assets/star.svg" id="favorito-star">
            </button>';
}
else
{
    $btn = "<btn class='btn text-muted' id='botao-favotirar' title='adicionar página aos favoritos' onclick='cadastrarFavorito(`Lista Produto`, `/listaProduto`)'>
                <img src='../../assets/star-fill.svg' id='favorito-star'>
            </btn>";
}
// FINAL DO CÓDIGO QUE VERIFICA SE A PAǴINA ESTÁ NOS FAVORITOS

// INICIO DO CÓDIGO RESPONSÁVEL POR CARREGAR O SELECT DOS GRUPOS CADASTRADOS
$conn = new PgsqlCommands();
$sql = "SELECT codigo, nome FROM grupo WHERE nome LIKE :nome";
$result = $conn->select($sql, array('nome' => '%'));

$groupOptions = "";

for($i = 0; $i < count($result); $i++){
    $groupOptions .= "<option value='".$result[$i]['codigo']."'>".$result[$i]['nome']."</option>";
}
// FINAL DO CÓDIGO RESPONSÁVEL POR CARREGAR O SELECT DOS GRUPOS CADASTRADOS

?>