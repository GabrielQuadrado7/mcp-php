<?php

// COMEÇO DO CÓDIGO QUE VERIFICA SE A PAǴINA ESTÁ NOS FAVORITOS
// SE ESTIVER A ESTRELA FICA PRETA, SENÃO FICA BRANCA
include_once "../../class/PgsqlCommands.class.php";

$conn = new PgsqlCommands();

$ambiente = array(
    "nome" => "HomePage"
);

$sql = "SELECT codigo FROM favorito WHERE nomeAmbiente = :nome";

$return = $conn->select($sql, $ambiente);

if(count($return) == 1)
{
    $btn = '<button class="btn text-muted" id="botao-favotirar" title="adicionar página aos favoritos" onclick="deletarFavorito(`HomePage`, `/main`)">
                <img src="../../assets/star.svg" id="favorito-star">
            </button>';
}
else
{
    $btn = "<btn class='btn text-muted' id='botao-favotirar' title='adicionar página aos favoritos' onclick='cadastrarFavorito(`HomePage`, `/main`)'>
                <img src='../../assets/star-fill.svg' id='favorito-star'>
            </btn>";
}
// FINAL DO CÓDIGO QUE VERIFICA SE A PAǴINA ESTÁ NOS FAVORITOS

// COMEÇO DO CÓDIGO QUE CARREGA OS LINKS DAS PÁGINAS ADICIONADAS COMO FAVORITO
$sql = "SELECT * FROM favorito WHERE nomeAmbiente like :nome";
$favs = $conn->select($sql, array('nome' => '%'));

$favList = "";

if(count($favs) >= 1)
{
    for($i = 0; $i < count($favs); $i++){
        if(is_dir("../.." . $favs[$i]['caminhoambiente']))
        {
            $favs[$i]['caminhoambiente'] = "../../" . $favs[$i]['caminhoambiente'];
            $favList .= "<a class='text-dark' href='".$favs[$i]['caminhoambiente']."'>".$favs[$i]['nomeambiente']."</a><br>";
        }
        else
        {
            $favs[$i]['caminhoambiente'] = "../" . $favs[$i]['caminhoambiente'];
            $favList .= "<a class='text-dark' href='".$favs[$i]['caminhoambiente']."'>".$favs[$i]['nomeambiente']."</a><br>";
        }
    }
}
if($favList == "")
{
    $favList = "<p class='text-dark'>Nenhuma página adicionada aos favoritos</p>";
}

// FINAL DO CÓDIGO QUE CARREGA OS LINKS DAS PÁGINAS ADICIONADAS COMO FAVORITO




?>