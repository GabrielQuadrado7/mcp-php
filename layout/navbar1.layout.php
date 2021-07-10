<?php
    if(is_dir("../../includes"))
    {
        include_once "../../includes/navbar.php";
    }
    else
    {
        include_once "../includes/navbar.php";
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta http-equiv="cache-control" content="max-age=0" />
        <meta http-equiv="cache-control" content="no-cache" />
        <meta http-equiv="expires" content="0" />
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link href="<?php echo($bootstrapPath);?>" rel="stylesheet" />
        <link href="<?php echo($globalCSS);?>" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <title><?php echo($_GET['title']);?></title>
    </head>
    <body class="">
        <div class="d-flex toggled" id="wrapper">
            <!-- Sidebar-->
            <div class="" id="sidebar-wrapper">
                <div class="sidebar-heading text-light font-weight-bolder pr-5">
                    <!--<div>Ícones feitos por <a href="https://www.freepik.com" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/br/" title="Flaticon">www.flaticon.com</a></div>-->
                    
                    <p><img src="<?php echo($iconSideMenu);?>" width="36px" height="36px" style="color: #fff;">&nbsp;&nbsp;M C P</p>
                </div>
                <div class="list-group list-group-flush">
                    <a class="item-nav list-group-item list-group-item-action bg-dark text-light" href="<?php echo($mainPath); ?>">
                        <img src="<?php echo($starFillWhite); ?>" class="pr-4">
                        HomePage
                    </a>

                    <div class="btn-group dropright">
                        <button class="item-nav list-group-item list-group-item-action bg-dark text-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#!">
                            <img src="<?php echo($plusSquare); ?>" class="pr-4">
                            Cadastro
                        </button>
                        <div class="dropdown-menu p-0">
                            <ul class="list-group shadow-sm">
                                <li class="list-group-item bg-dark text-light">
                                <img src="<?php echo($carretRight); ?>" class="pr-4">
                                Cadastro
                                </li>
                                <li class="dropdown-item text-dark list-group-item list-group-item-light">
                                    <a class="text-decoration-none text-dark" href="<?php echo($cadastroProdutoPath); ?>">Cadastro de Produtos</a>
                                </li>
                                <li class="dropdown-item text-dark list-group-item list-group-item-light">
                                    <a class="text-decoration-none text-dark" href="<?php echo($cadastroGrupoPath); ?>">Cadastro de Grupos</a>
                                </li>
                                <li class="dropdown-item text-dark list-group-item list-group-item-light">
                                    <a class="text-decoration-none text-dark" href="<?php echo($cadastroEtapaPath); ?>">Cadastro de Etapas</a>
                                </li>
                            </ul>
                        </div> 
                    </div>

                    <div class="btn-group dropright">
                        <button class="item-nav list-group-item list-group-item-action bg-dark text-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#!">
                            <img src="<?php echo($cardList); ?>" class="pr-4">
                            Lista
                        </button>
                        <div class="dropdown-menu p-0">
                            <ul class="list-group shadow-sm">
                                <li class="list-group-item bg-dark text-light">
                                <img src="<?php echo($carretRight); ?>" class="pr-4">
                                Lista
                                </li>
                                <li class="dropdown-item text-dark list-group-item list-group-item-light">
                                    <a class="text-decoration-none text-dark" href="<?php echo($listaProdutoPath); ?>">Lista de Produtos</a>
                                </li>
                                <li class="dropdown-item text-dark list-group-item list-group-item-light">
                                    <a class="text-decoration-none text-dark" href="<?php echo($listaGrupoPath); ?>">Lista de Grupos</a>
                                </li>
                                <li class="dropdown-item text-dark list-group-item list-group-item-light">
                                    <a class="text-decoration-none text-dark" href="<?php echo($listaEtapaPath); ?>">Lista de Etapas</a>
                                </li>
                            </ul>
                        </div> 
                    </div>

                    <div class="btn-group dropright">
                        <button class="item-nav list-group-item list-group-item-action bg-dark text-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#!">
                            <img src="<?php echo($box); ?>" class="pr-4">
                            Remessa
                        </button>
                        <div class="dropdown-menu p-0">
                            <ul class="list-group shadow-sm">
                                <li class="list-group-item bg-dark text-light">
                                <img src="<?php echo($carretRight); ?>" class="pr-4">
                                Remessa
                                </li>
                                <li class="dropdown-item text-dark list-group-item list-group-item-light">
                                    <a class="text-decoration-none text-dark" href="<?php echo($cadastroRemessaPath); ?>">Cadastrar Remessa</a>
                                </li>
                                <li class="dropdown-item text-dark list-group-item list-group-item-light">
                                    <a class="text-decoration-none text-dark" href="<?php echo($listaRemessaPath); ?>">Visualizar Remessa</a>
                                </li>
                            </ul>
                        </div> 
                    </div>
                </div>
            </div>
            <!-- Page Content-->
            <div id="page-content-wrapper">
                <nav class="navbar navbar-expand-lg navbar-light m-1 rounded" id="nav-main">
                    <a class="btn text-light font" id="menu-toggle">
                        <img src="<?php echo($iconMenuButton); ?>" id="menuButtonActive" class="menuButton">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#!" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Encerrar</a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item text-danger" href="<?php echo($logout)?>">Sair</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>

                <!-- Div para mostrar as notificações -->
                <div aria-live="polite" aria-atomic="true" class="position-relative">
                    <div class="position-absolute" id="area-notificacao" style="top: 0px; right: 20px">
                    </div>
                </div>

                <div class="container-xl bg-light border p-3 mt-5 rounded overflow-auto" id="main-screen">
                    <div class="m-5">

                    
                    