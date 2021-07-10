<?php

// SETA AS VARIÁVEIS USADAS PARA COMPOR O ENTORNO DO LAYOUT

// seta o caminho do bootstrap
if(file_exists("../../css/bootstrap.css"))
{
    $bootstrapPath = "../../css/bootstrap.css";
}

// seta os caminhos dos ambientes
if(is_dir("../cadastroProduto"))
{
    $mainPath = "../main";
    $cadastroProdutoPath = "../cadastroProduto/";
    $cadastroEtapaPath = "../cadastroEtapa/";
    $cadastroGrupoPath = "../cadastroGrupo/";
    $cadastroRemessaPath = "../cadastroRemessa";
    $listaProdutoPath = "../listaProduto/";
    $listaEtapaPath = "../listaEtapa/";
    $listaGrupoPath = "../listaGrupo";
    $listaRemessaPath = "../listaRemessa";
}

// seta o caminhos dos icones
if(file_exists("../../assets/icon.png"))
{
    $iconSideMenu = "../../assets/icon.png";
    $iconMenuButton = "../../assets/listMenu.svg";
    $plusSquare = "../../assets/plus-square.svg";
    $cardList = "../../assets/card-list.svg";
    $carretRight = "../../assets/caret-right.svg";
    $starFillWhite = "../../assets/star-fill-white.svg";
    $box = "../../assets/box.svg";
}

if(file_exists("../../js/cadastro.js"))
{
    $cadastroJS = "../../js/cadastro.js";
    $listaJS = "../../js/lista.js";
    $setJS = "../../js/set.js";
    $deleteJS = "../../js/delete.js";
    $updateJS = "../../js/update.js";
    $jQueryJS ="../../js/jquery-3.6.0.min.js";
    $htmlJS = "../../js/html.js";
}

if(file_exists("../../css/global.css"))
{
    $globalCSS = "../../css/global.css";
}

if(file_exists("../../functions/logout.php"))
{
    $logout = "../../functions/logout.php";
}

?>