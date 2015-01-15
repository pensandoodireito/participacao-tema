<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="application-name" content="">
    <meta name="msapplication-TileColor" content="">
    <link rel="shortcut icon" href="images/favicon-pd.jpg">
    <title><?php get_bloginfo('title'); ?> - <?php get_bloginfo('description'); ?></title>

    <!-- styles gerais do portal -->
    <link href="<?php echo get_stylesheet_uri(); ?>" rel="stylesheet">

    <!-- HTML5Shim e Respond.js oferecem suporte HTML5 e media queries para o IE8 -->
    <!-- AVISO: Respond.js não funciona localmente ("//file:...") -->
    <!--[if lt IE 9]>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/html5shiv.min.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<!-- <div id="barra-brasil" style="background:#7F7F7F; height: 20px; padding:0 0 0 10px; display:block;" class="clearfix">
    <ul id="menu-barra-temp" style="list-style:none;">
        <li style="display:inline; float:left;padding-right:10px; margin-right:10px; border-right:1px solid #EDEDED"><a href="http://brasil.gov.br" style="font-family:sans,sans-serif; text-decoration:none; color:white;">Portal do Governo Brasileiro</a>
        </li>
        <li><a style="font-family:sans,sans-serif; text-decoration:none; color:white;" href="http://epwg.governoeletronico.gov.br/barra/atualize.html">Atualize sua Barra de Governo</a>
        </li>
    </ul>
</div> -->
<div class="container">
    <div class="header">
        <div class="col-xs-3">
            <div id="logo-principal">
                <a href="#">
                    <h1>Portal do Projeto Pensando o Direito</h1>
                </a>
            </div>
        </div>
        <div class="col-xs-9 pull-right" id="navegacao-top">
            <nav class="navbar">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#menu-top">
                            <i class="fa fa-caret-square-o-down"></i> Menu
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="menu-top">

                        <form class="navbar-form navbar-right" role="search" id="busca">
                            <div class="input-group busca-pd">
                                <input type="text" class="form-control" placeholder="Buscar no site" name="srch-term"
                                       id="srch-term">

                                <div class="input-group-btn">
                                    <button class="btn btn-default" type="submit"><i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#">Notícias</a></li>
                            <li><a href="#">Editais</a></li>
                            <li><a href="#">Parceiros</a></li>
                            <li><a href="#">Fale conosco</a></li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-fluid -->
            </nav>
        </div>
    </div>
</div>
<div id="navegacao-destaque">
    <div class="container">
        <ul class="navegacao-destaque-list">
            <li class="navegacao-destaque-item">
                <div class="navegacao-destaque-content">
                    <h5><a href="#">Conheça o projeto</a></h5>

                    <p><a href="#">Conheça também a Secretaria de Assuntos Legislativos (SAL)</a>
                    </p>
                </div>
            </li>
            <li class="navegacao-destaque-item">
                <div class="navegacao-destaque-content">
                    <h5><a href="#">Publicações</a></h5>

                    <p><a href="#">Conheça também a Secretaria de Assuntos Legislativos (SAL)</a>
                    </p>
                </div>
            </li>
            <li class="navegacao-destaque-item">
                <div class="navegacao-destaque-content">
                    <h5><a href="#">Debates</a></h5>

                    <p><a href="#">Sua participação é muito importante</a>
                    </p>
                </div>
            </li>
            <li class="navegacao-destaque-item participe">
                <div class="arrow-right"></div>
                <div class="navegacao-destaque-content">
                    <h5><a href="#">Participe!</a></h5>

                    <p><a href="#">Cadastre-se</a>
                        <br/><a href="#">Já é cadastrado?</a>
                    </p>
                </div>
            </li>
        </ul>
    </div>
</div>
<div class="conteudo">
    <div class="container mt-sm">
        <div class="row">
            <div class="col-md-6">
                <h2 class="font-roboto red">Debates Públicos</h2>
            </div>
            <div class="col-md-6 text-right">
                <p>
                    <button type="button" class="btn btn-danger">Participe!</button>
                    <strong class="mt-xs ml-md"><a href="#">Cadastre-se</a> | <a href="#">Já é cadastrado?</a></strong>
                </p>
            </div>
        </div>
    </div>