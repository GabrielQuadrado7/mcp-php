<?php


// COMEÇO DO CÓDIGO QUE VERIFICA SE A PAǴINA ESTÁ NOS FAVORITOS
// SE ESTIVER A ESTRELA FICA PRETA, SENÃO FICA BRANCA
include_once "../../class/PgsqlCommands.class.php";

$conn = new PgsqlCommands();

$ambiente = array(
    "nome" => "Cadastro Etapa"
);

$sql = "SELECT codigo from favorito where nomeAmbiente = :nome";

$return = $conn->select($sql, $ambiente);

if(count($return) == 1)
{
    $btn = '<button class="btn text-muted" id="botao-favotirar" title="adicionar página aos favoritos" onclick="deletarFavorito(`Cadastro Etapa`, `/cadastroEtapa`)">
                <img src="../../assets/star.svg" id="favorito-star">
            </button>';
}
else
{
    $btn = "<btn class='btn text-muted' id='botao-favotirar' title='adicionar página aos favoritos' onclick='cadastrarFavorito(`Cadastro Etapa`, `/cadastroEtapa`)'>
                <img src='../../assets/star-fill.svg' id='favorito-star'>
            </btn>";
}
// FINAL DO CÓDIGO QUE VERIFICA SE A PAǴINA ESTÁ NOS FAVORITOS

?>