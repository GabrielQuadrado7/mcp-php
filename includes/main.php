<?php

include_once "../../class/PgsqlCommands.class.php";

/**
 * 
 * this part verify if the current page is fav
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
    "nome" => "HomePage"
);

$sql = "SELECT codigo FROM favorito WHERE nomeAmbiente = :nome";

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
    $btn = '<button class="btn text-muted" id="botao-favoritar" title="adicionar página aos favoritos" onclick="deletarFavorito(`HomePage`, `/main`)">
                <img src="../../assets/star.svg" id="favorito-star">
            </button>';
}
else
{
    $btn = "<btn class='btn text-muted' id='botao-favoritar' title='adicionar página aos favoritos' onclick='cadastrarFavorito(`HomePage`, `/main`)'>
                <img src='../../assets/star-fill.svg' id='favorito-star'>
            </btn>";
}



/**
 * 
 * this part of code load the pages that is favorites on database
 * 
 * @var $sql = query in database
 * @var $favs = favorites pages that is table favorito on database (array)
 * @var $favList = html content that show the favorites pages shortcuts
 * 
 */

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




?>