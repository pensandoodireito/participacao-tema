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
        <!-- Barra Brasil -->
        <div id="barra-brasil" style="background:#7F7F7F; height: 20px; padding:0 0 0 10px;display:block;">
            <ul id="menu-barra-temp" style="list-style:none;">
                <li style="display:inline; float:left;padding-right:10px; margin-right:10px; border-right:1px solid #EDEDED"><a href="http://brasil.gov.br" style="font-family:sans,sans-serif; text-decoration:none; color:white;">Portal do Governo Brasileiro</a></li>
                <li><a style="font-family:sans,sans-serif; text-decoration:none; color:white;" href="http://epwg.governoeletronico.gov.br/barra/atualize.html">Atualize sua Barra de Governo</a></li>
            </ul>
        </div>
        <!-- /Barra Brasil -->
        <div class="header">
            <div class="container">
                <div class="header-content">
                    <div class="col-xs-2">
                        <div id="logo-principal">
                            <a href="<?php echo network_home_url("/");  ?>">
                                <h1>Portal do Projeto Pensando o Direito</h1>
                            </a>
                        </div>
                    </div>
                    <div class="col-xs-10 pull-right" id="navegacao-top">
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
                                    <?php
										//Desafio numero 1 do edital
										//Preparação para a troca do menu quando é criado um novo site na rede
										//Pegar o site atual
										global $blog_id;
										$site_atual = $blog_id;
										switch_to_blog(1);
										//Adiciona o menu global criado para os novos sites
										wp_nav_menu(
										   ( array( 'theme_location' => 'menu-global', 'menu_class' => 'nav navbar-nav navbar-right' ))
										);
										//Faz a troca para o site atual
										switch_to_blog($site_atual);
									?>
                                </div><!-- /.navbar-collapse -->
                            </div><!-- /.container-fluid -->
                        </nav>
                    </div>
                </div>
            </div>
        </div> <!-- class header-->
        <div id="navegacao-destaque">
            <div class="container">
                <div class="row">
                
                	    <?php
							global $blog_id;
							$site_atual2 = $blog_id;
							switch_to_blog(1);
							wp_nav_menu(
							( array( 'theme_location' => 'menu-primario', 'menu_class' => 'navegacao-destaque-list' ))			);
							switch_to_blog($site_atual2);
						?>
                </div> <!-- /row -->
            </div>
        </div>
    </div>
</div>
    <div class="conteudo">
        <div class="container mt-sm">
            <div class="row">
                <div class="col-md-8">
                    <!-- breadcrumb -->
                    <?php wp_custom_breadcrumbs(); ?>
                    <!-- /breadcrumb -->
                </div>
                <div class="col-md-4 text-right">
                    <p>
                    <strong class="mt-xs ml-md"><?php echo participacao_get_logged_user(); ?></strong>
                    </p>
                </div>
            </div>
        </div>
