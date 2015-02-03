<!DOCTYPE html>
<html lang="pt-br">
<?php
    $title = "";

    if (is_singular()) {
        $page_title = get_the_title() . ' - ' . get_bloginfo('title');
        $title = get_the_title();
        $description = get_the_excerpt();
    } else {
        $page_title = get_bloginfo('title') . ' - ' . get_bloginfo('description');
        $title = get_bloginfo('title');
        $description = get_bloginfo('description');
    }
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="application-name" content="">
    <meta name="msapplication-TileColor" content="">
    <meta property="og:image" content="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png"/>
    <meta property="og:title" content="<?php echo $title; ?>"/>
    <meta property="og:site_name" content="<?php echo get_bloginfo('title'); ?>"/>
    <meta property="og:description" content="<?php echo $description; ?>"/>
    <meta property="og:type" content="website"/>
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon-pd.jpg">
    <title><?php echo $page_title; ?></title>
    <!-- styles gerais do portal -->
    <link href="<?php echo get_stylesheet_uri(); ?>" rel="stylesheet">
    <!-- HTML5Shim e Respond.js oferecem suporte HTML5 e media queries para o IE8 -->
    <!-- AVISO: Respond.js não funciona localmente ("//file:...") -->
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/respond.min.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
</head>
<body>
<div class="header">
    <div class="container">
        <div class="header-content">
            <div class="col-xs-3">
                <div id="logo-principal">
                    <a href="<?php echo network_home_url("/");  ?>">
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

                            <?php echo get_search_form(); ?>


                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="http://participacao.mj.gov.br/pensandoodireito/noticias/">Notícias</a></li>
                                <li><a href="http://participacao.mj.gov.br/pensandoodireito/editais/">Editais</a></li>
                                <li><a href="http://participacao.mj.gov.br/pensandoodireito/parceiros/">Parceiros</a>
                                </li>
                                <li><a href="http://participacao.mj.gov.br/pensandoodireito/contato/">Fale conosco</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.navbar-collapse -->
                    </div>
                    <!-- /.container-fluid -->
                </nav>
            </div>
        </div>
    </div>
</div>
<div id="navegacao-destaque">
    <div class="container">
        <ul class="navegacao-destaque-list">
            <li class="navegacao-destaque-item">
                <div class="navegacao-destaque-content">
                    <h5><a href="http://participacao.mj.gov.br/pensandoodireito/o-que-e/">Conheça o projeto</a></h5>

                    <p><a href="http://participacao.mj.gov.br/pensandoodireito/o-que-e/">Criado para promover a
                            democratização do processo de elaboração legislativa.</a></p>
                </div>
            </li>
            <li class="navegacao-destaque-item">
                <div class="navegacao-destaque-content">
                    <h5><a href="http://participacao.mj.gov.br/pensandoodireito/publicacoes/">Publicações</a></h5>

                    <p><a href="http://participacao.mj.gov.br/pensandoodireito/publicacoes/">Conheça as publicações da
                            Série Pensando o Direito.</a></p>
                </div>
            </li>
            <li class="navegacao-destaque-item">
                <div class="navegacao-destaque-content">
                    <h5><a href="http://participacao.mj.gov.br/pensandoodireito/debates/">Debates</a></h5>

                    <p><a href="http://participacao.mj.gov.br/pensandoodireito/debates/">Conheça os debates já
                            realizados.</a>
                    </p>
                </div>
            </li>
            <li class="navegacao-destaque-item participe">
                <div class="arrow-right"></div>
                <div class="navegacao-destaque-content">
                    <h5><a href="<?php echo pensando_get_participe_link(); ?>">Participe!</a></h5>

                    <p><?php echo pensando_get_logged_user(); ?>
                    </p>
                    <p></p>
                </div>
            </li>
        </ul>
    </div>
</div>
<div class="conteudo">
    <div class="container mt-sm">
        <div class="row">
            <div class="col-md-8">
                <h2 class="font-roboto red"><a
                        href="<?php echo site_url("/"); ?>"><?php echo get_bloginfo('title'); ?></a></h2>
                <p><?php echo get_bloginfo('description'); ?></p>
            </div>
            <div class="col-md-4 text-right">
                <p>
                    <a href="<?php echo pensando_get_participe_link(); ?>" class="btn btn-danger">Participe!</a>
                    <strong class="mt-xs ml-md"><?php echo pensando_get_logged_user(); ?></strong>
                </p>
            </div>
        </div>
    </div>