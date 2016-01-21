<?php

add_theme_support( 'post-thumbnails' );

add_image_size( 'noticia-destaque', 555, 290, true );
add_image_size( 'noticia-lista', 214, 137, true );

function add_video_support() {
    add_post_type_support( 'posts', 'post-formats' );
    add_theme_support( 'post-formats', array( 'video' ) );
}

add_action( 'init', 'add_video_support' );

function logout_ajax_request() {
    header( "Content-type: application/json", true );
    wp_logout();
    die;
}

function login_ajax_request() {
    $username = isset( $_POST['username'] ) ? $_POST['username'] : null;
    $password = isset( $_POST['password'] ) ? $_POST['password'] : null;

    $object = wp_authenticate( $username, $password );


    if ( ! $object instanceof WP_User ) {
        $json = json_encode( false );
    } else {
        wp_signon( array( 'user_login' => $username, 'user_password' => $password ) );
        unset( $object->data->user_pass );
        $json = json_encode( $object->data );
    }

    header( "Content-type: application/json", true );
    die( $json );
}

add_action( 'wp_ajax_login_ajax_request', 'login_ajax_request' );
add_action( 'wp_ajax_nopriv_login_ajax_request', 'login_ajax_request' );

add_action( 'wp_ajax_logout_ajax_request', 'logout_ajax_request' );
add_action( 'wp_ajax_nopriv_logout_ajax_request', 'logout_ajax_request' );

function participacao_scripts() {
    global $wp_query;

    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap/bootstrap.min.js', array( 'jquery' ), false, true );
    wp_enqueue_script( 'validator', get_template_directory_uri() . '/js/validator.min.js', array(
            'jquery',
            'bootstrap'
    ), false, true );

    wp_enqueue_script( 'participacao', get_template_directory_uri() . '/js/participacao.js', array(
            'jquery',
            'bootstrap'
    ), false, true );

    wp_enqueue_script( 'noticias', get_template_directory_uri() . '/js/noticias.js', array( 'jquery' ) );

    $participacao_data = array(
            'ajaxurl'           => admin_url( 'admin-ajax.php' ),
            'paginaAtual'       => 2,
            'ajaxgif'           => get_template_directory_uri() . '/images/ajax-loader.gif',
            'isHome'            => is_home() ? 'true' : 'false',
            'paginasMaximas'    => $wp_query->max_num_pages,
            'categoriaNoticias' => get_query_var( 'cat' )
    );

    wp_localize_script( 'participacao', 'participacao', $participacao_data );
    wp_localize_script( 'participacao', 'participacao', $participacao_data );
}

add_action( 'wp_enqueue_scripts', 'participacao_scripts' );


function participacao_header_scripts() {
    /**
     * este script contém apenas workaround para garantir que seja feito redirecionamento para a URL pensando.mj.gov.br
     * ele é carregado antes de qualquer script então nenhuma biblioteca estará disponível.
     */
    wp_enqueue_script( 'participacao-header', get_template_directory_uri() . '/js/participacao-header.js' );
}

add_action( 'wp_enqueue_scripts', 'participacao_header_scripts', 1 );
/**
 * Retorna o bloco de texto para usuários logados ou não, com
 * seus respectivos links de cadastro, login e logout.
 *
 * @return string
 */
function participacao_get_logged_user() {
    if ( is_user_logged_in() ) {
        $current_user  = wp_get_current_user();
        $display_name  = $current_user->display_name;
        $loggedStyle   = ' style="display:inline"';
        $unloggedStyle = ' style="display:none"';
    } else {
        $display_name  = '';
        $loggedStyle   = ' style="display:none"';
        $unloggedStyle = ' style="display:inline"';
    }

    return '<span class="logged" ' . $loggedStyle . '>Olá <span class="user-display-name">' . $display_name . '</span>! <a href="' . wp_logout_url() . '">Logout?</a></span>
    <span class="unlogged" ' . $unloggedStyle . '><a href="#' . wp_registration_url() . '" data-toggle="modal" data-target="#registrationModal">Cadastre-se</a> <a href="#' . wp_login_url( $_SERVER['REQUEST_URI'] ) . '" class="login-btn" data-toggle="modal" data-target="#loginModal">Faça seu login</a></span>';
}

/**
 * Retornar o link para o espaço de participação. Se o delibera
 * está ativo, retorna o link do delibera, se não, tenta retornar
 * o link de uma página chamada Participe. Se não encontra nada
 * retorna #
 *
 * @return string
 */
function participacao_get_participe_link() {
    $link_delibera = get_post_type_archive_link( 'pauta' );

    if ( $link_delibera == "" ) {
        $page_participe = participacao_get_participe_page();

        if ( $page_participe != null ) {
            return get_page_link( $page_participe->ID );
        } else {
            return "#";
        }
    } else {
        return $link_delibera;
    }
}

function participacao_get_participe_page() {

    return get_page_by_path( '/participe' );

}

/**
 * Função para retornar o aviso de cadastro dentro do mini-tutorial
 *
 * @return string
 */
function participacao_get_cadastrase_minitutorial() {
    if ( is_user_logged_in() ) {
        $current_user = wp_get_current_user();

        return 'Olá ' . $current_user->display_name . '!';
    } else {

        return 'Se não é cadastrada(o): <a href="' . wp_registration_url() . '">cadastre-se</a>';
    }

}

add_action( 'admin_menu', 'participacao_add_admin_menu' );
add_action( 'admin_init', 'participacao_settings_init' );

/**
 * Adiciona o link para a página de opções do tema no menu
 */
function participacao_add_admin_menu() {

    add_options_page( 'Outras opções', 'Outras opções', 'manage_options', 'participacao-tema', 'participacao_options_page' );

}

/**
 * Inicia os campos das opções do tema
 */
function participacao_settings_init() {

    register_setting( 'pluginPage', 'participacao_settings' );

    add_settings_section(
            'participacao_pluginPage_section',
            'Opções do tema ' . get_bloginfo( 'name' ),
            null,
            'pluginPage'
    );

    add_settings_field(
            'participacao_sitelogo',
            'Logo do site',
            'participacao_sitelogo_render',
            'pluginPage',
            'participacao_pluginPage_section'
    );

    add_settings_field(
            'participacao_sitelogo_preview',
            '',
            'participacao_sitelogo_preview_render',
            'pluginPage',
            'participacao_pluginPage_section'
    );

    add_settings_field(
            'participacao_twitter_embed',
            'Código do widget do Twitter (usar altura máxima de 350px)',
            'participacao_twitter_render',
            'pluginPage',
            'participacao_pluginPage_section'
    );

    add_settings_field(
            'participacao_facebook_embed',
            'Código do widget do Facebook (usar altura máxima de 350px)',
            'participacao_facebook_render',
            'pluginPage',
            'participacao_pluginPage_section'
    );

    add_settings_field(
            'participacao_youtube_embed',
            'Código do widget do YouTube (usar altura máxima de 350px)',
            'participacao_youtube_render',
            'pluginPage',
            'participacao_pluginPage_section'
    );

    add_settings_field(
            'participacao_diaspora_embed',
            'Código do widget do Diaspora (usar altura máxima de 350px)',
            'participacao_diaspora_render',
            'pluginPage',
            'participacao_pluginPage_section'
    );

    add_settings_field(
            'participacao_max_sticky_news',
            'Quantidade máxima de notícias de destaque',
            'participacao_max_sticky_news_render',
            'pluginPage',
            'participacao_pluginPage_section'
    );

    add_settings_field(
            'participacao_max_categories_news',
            'Quantidade máxima de categorias de notícias a serem exibidas',
            'participacao_max_categories_news_render',
            'pluginPage',
            'participacao_pluginPage_section'
    );

    add_settings_field(
            'participacao_max_news_per_category',
            'Quantidade máxima de notícias a serem exibidas para cada categoria',
            'participacao_max_news_per_category_render',
            'pluginPage',
            'participacao_pluginPage_section'
    );

}

/**
 * Render do campo para logo
 */
function participacao_sitelogo_render() {

    $options = get_option( 'participacao_settings' );
    ?>
    <input type="hidden" id="logo_url" name="participacao_settings[logo]"
           value="<?php echo esc_url( $options['logo'] ); ?>"/>
    <input id="upload_logo_button" type="button" class="button" value="Escolher/trocar uma imagem"/>
    <?php

}

/**
 * Render da previsualização da logo
 */
function participacao_sitelogo_preview_render() {
    $options = get_option( 'participacao_settings' ); ?>
    <div id="upload_logo_preview" style="min-height: 100px;">
        <img style="max-width:100%; <?php echo( ! isset( $options['logo'] ) ? "display: none;" : "" ); ?>"
             src="<?php echo esc_url( $options['logo'] ); ?>"/>
    </div>
    <?php
}

/**
 * Render do campo para o widget do Twitter
 */
function participacao_twitter_render() {

    $options = get_option( 'participacao_settings' );
    ?>
    <textarea cols='40' rows='5' name='participacao_settings[participacao_twitter_embed]'>
        <?php echo $options['participacao_twitter_embed']; ?>
    </textarea>
    <?php

}


function participacao_facebook_render() {

    $options = get_option( 'participacao_settings' );
    ?>
    <textarea cols='40' rows='5' name='participacao_settings[participacao_facebook_embed]'>
        <?php echo $options['participacao_facebook_embed']; ?>
    </textarea>
    <?php

}


function participacao_youtube_render() {

    $options = get_option( 'participacao_settings' );
    ?>
    <textarea cols='40' rows='5' name='participacao_settings[participacao_youtube_embed]'>
        <?php echo $options['participacao_youtube_embed']; ?>
    </textarea>
    <?php

}


function participacao_diaspora_render() {

    $options = get_option( 'participacao_settings' );
    ?>
    <textarea cols='40' rows='5' name='participacao_settings[participacao_diaspora_embed]'>
        <?php echo $options['participacao_diaspora_embed']; ?>
    </textarea>
    <?php

}

function participacao_max_sticky_news_render() { ?>
    <input type="text" name='participacao_settings[participacao_max_sticky_news]'
           value="<?php echo filter_int_option( 'participacao_max_sticky_news' ); ?>">
    <?php
}

function participacao_max_categories_news_render() { ?>
    <input type="text" name='participacao_settings[participacao_max_categories_news]'
           value="<?php echo filter_int_option( 'participacao_max_categories_news' ) ?>">
    <?php
}

function participacao_max_news_per_category_render() { ?>
    <input type="text" name='participacao_settings[participacao_max_news_per_category]'
           value="<?php echo filter_int_option( 'participacao_max_news_per_category' ); ?>">
    <?php
}

function filter_int_option( $setting, $default = 3 ) {
    $options = get_option( 'participacao_settings' );

    return isset( $options[ $setting ] ) && is_numeric( $options[ $setting ] ) ? (int) $options[ $setting ] : $default;
}

function participacao_options_page() {

    ?>
    <form action='options.php' method='post'>

        <h2>Outras opções</h2>

        <?php
        settings_fields( 'pluginPage' );
        do_settings_sections( 'pluginPage' );
        submit_button();
        ?>

    </form>
    <?php

}

add_action( 'admin_enqueue_scripts', 'participacao_options_enqueue_scripts' );
function participacao_options_enqueue_scripts() {
    wp_register_script( 'participacao-upload', get_template_directory_uri() . '/js/participacao-upload.js', array(
            'jquery',
            'media-upload',
            'thickbox'
    ) );

    if ( 'settings_page_participacao-tema' == get_current_screen()->id ) {
        wp_enqueue_script( 'jquery' );

        wp_enqueue_script( 'thickbox' );
        wp_enqueue_style( 'thickbox' );

        wp_enqueue_script( 'media-upload' );
        wp_enqueue_script( 'participacao-upload' );

    }

}

add_action( 'admin_init', 'participacao_sitelogo_option_setup' );

function participacao_sitelogo_option_setup() {
    global $pagenow;

    if ( 'media-upload.php' == $pagenow || 'async-upload.php' == $pagenow ) {
        add_filter( 'gettext', 'participacao_sitelogo_change_text', 1, 3 );
    }
}

function participacao_sitelogo_change_text( $translated_text, $text, $domain ) {
    if ( 'Insert into Post' == $text ) {
        $referer = strpos( wp_get_referer(), 'settings_page_participacao-tema' );
        if ( $referer != '' ) {
            return 'Definir essa imagem como logo do site';
        }
    }

    return $translated_text;
}

add_action( 'signup_extra_fields', 'participacao_formulario_registro' );

/**
 * Inclusão de campos extras no registro do WordPress
 */
function participacao_formulario_registro( $errors ) {

    $nice_name = ( ! empty( $_POST['nice_name'] ) ) ? trim( $_POST['nice_name'] ) : '';

    ?>
    <label for="nice_name">Nome de apresentação</label>
    <input type="text" name="nice_name" id="nice_name" value="<?php echo esc_attr( wp_unslash( $nice_name ) ); ?>"
           size="25"/><br/>
    Esse nome será usado em todos os seus comentários públicos.

    <label for="termos_uso">
        <input type="checkbox" name="termos_uso" id="termos_uso" class="checkbox"/>
        Li e aceito os <a href="<?php echo get_permalink( get_page_by_path( '/termos-de-uso' ) ); ?>" target="_blank">termos
            de uso</a>.
    </label>
    <?php if ( $errmsg = $errors->get_error_message( 'termos_uso' ) ) { ?>
        <p class="error"><?php echo $errmsg ?></p>
    <?php } ?>
    <?php
}

add_filter( 'add_signup_meta', 'participacao_salvar_meta' );

/**
 * Salva os campos extras
 *
 * @param $user_id
 */
function participacao_salvar_meta( $meta ) {
    if ( ! empty( $_POST['nice_name'] ) ) {
        $meta['nice_name'] = trim( $_POST['nice_name'] );
    }

    return $meta;
}

add_filter( 'wpmu_validate_user_signup', 'participacao_validacao', 10, 3 );

/**
 * Validação dos campos extras
 *
 * @param $errors
 * @param $sanitized_user_login
 * @param $user_email
 *
 * @return mixed
 */
function participacao_validacao( $result ) {

    if ( ! isset( $_POST['termos_uso'] ) || empty( $_POST['termos_uso'] ) ) {
        $result['errors']->add( 'termos_uso', 'Você precisa aceitar os termos de uso para se registrar na plataforma.' );
    }

    return $result;
}

add_action( 'init', 'participacao_habilitar_resumo' );

/**
 * Habilitar resumo para páginas
 */
function participacao_habilitar_resumo() {
    add_post_type_support( 'page', 'excerpt' );
}

add_action( 'get_header', 'participacao_remover_style_signup' );

function participacao_remover_style_signup() {
    remove_action( 'wp_head', 'wpmu_signup_stylesheet' );
    remove_action( 'wp_head', 'wpmu_activate_stylesheet' );
}

/**
 * Função ajax pra paginação infinita
 */
function participacao_paginacao_infinita() {
    global $wp_query;

    $paged = $_POST['paged'];

    $args = array(
            'paged'          => $paged,
            'posts_per_page' => get_option( 'posts_per_page' ),
            'post__not_in'   => get_option( 'sticky_posts' )
    );

    if ( isset( $_POST['cat'] ) ) {
        $args['category_name'] = $_POST['cat'];
    }

    $ordinary_news = new WP_Query( $args );

    if ( $ordinary_news->have_posts() ) {
        while ( $ordinary_news->have_posts() ) {
            $ordinary_news->the_post();
            get_template_part( 'content', 'archive' );
        }
    }

    exit;
}

add_action( 'wp_ajax_participacao_paginacao_infinita', 'participacao_paginacao_infinita' );
add_action( 'wp_ajax_nopriv_participacao_paginacao_infinita', 'participacao_paginacao_infinita' );


/**
 * Função ajax pra paginação infinita
 */
function noticias_carregamento_scroll() {
    $args['posts_per_page'] = get_option( 'posts_per_page' );

    $args = array(
            'paged'          => $_POST['paged'],
            'posts_per_page' => get_option( 'posts_per_page' )
    );

    if ( $_POST['categoria'] ) {
        $args['cat'] = $_POST['categoria'];
    }

    $ordinary_news = new WP_Query( $args );

    if ( $ordinary_news->have_posts() ) {
        while ( $ordinary_news->have_posts() ) {
            $ordinary_news->the_post();
            get_template_part( 'content', 'archive' );
        }
    }

    exit;
}

add_action( 'wp_ajax_noticias_carregamento_scroll', 'noticias_carregamento_scroll' );
add_action( 'wp_ajax_nopriv_noticias_carregamento_scroll', 'noticias_carregamento_scroll' );

/* MENUS DO TEMA PRINCIPAL */
// Menu principal, que fica abaixo da barra 'vermelha' aonde tem a busca
function register_menu_primario() {
    register_nav_menu( 'menu-primario', __( 'Menu Primário' ) );
}

add_action( 'init', 'register_menu_primario' );
// Menu secundário, que fica logo abaixo da "barra Brasil"
function register_menu_secundario() {
    register_nav_menu( 'menu-secundario', __( 'Menu Secundário' ) );
}

add_action( 'init', 'register_menu_secundario' );

// Modifica a formatação de um item de menu para adicionar a description
function add_description_to_menu( $item_output, $item, $depth, $args ) {
    if ( $args->theme_location == 'menu-primario' ) {
        $item_output = '<div class="navegacao-destaque-content">';
        $item_output .= sprintf( '<p><a href="%s">%s</a></p>', esc_html( $item->url ), esc_html( $item->title ) );
        //Ocultando o texto do menu:
        //$item_output .= sprintf('<p><a href="%s">%s</a></p>', esc_html($item->url), esc_html($item->description));
        $item_output .= '</div>';
    }

    return $item_output;
}

add_filter( 'walker_nav_menu_start_el', 'add_description_to_menu', 1, 4 );

/* BREADCRUMB */
function wp_custom_breadcrumbs( $levels = array() ) {
    $delimiter = '<i class="fa fa-angle-right text-muted"></i>'; // delimiter between crumbs
    $before    = '<span class="current text-muted">'; // tag before the current crumb
    $after     = '</span>'; // tag after the current crumb

    if ( $levels ) {
        $levels = get_breadcumbs_level();
    }

    if ( $levels ) {
        echo '<div id="crumbs red">';
        $links = array();

        foreach ( $levels as $level ) {
            if ( isset( $level[1] ) ) {
                $links[] = $before . '<a href="' . $level[1] . '" class="red">' . $level[0] . '</a>' . $after;
            } else {
                $links[] = $before . $level[0] . $after;
            }
        }

        echo implode( ' ' . $delimiter . ' ', $links );
        echo '</div>';
    }
} // end wp_custom_breadcrumbs()

function get_breadcumbs_level() {
    $showOnHome  = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
    $home        = 'Página inicial'; // text for the 'Home' link
    $showCurrent = 0; // 1 - show current post/page title in breadcrumbs, 0 - don't show
    $levels      = array();

    global $post;
    $homeLink = get_bloginfo( 'url' );

    $blog_ID = get_current_blog_id();
    if ( ( is_home() || is_front_page() ) && $blog_ID == 1 ) {
        if ( $showOnHome == 1 ) {
            $levels[] = array( $home, $homeLink );
        }

    } else {
        if ( $blog_ID != 1 ) {
            $current_theme = wp_get_theme();

            switch_to_blog( 1 );

            $levels[] = array( $home, get_site_url() );

            $tags = $current_theme->get( 'Tags' );

            if ( ! in_array( 'blog', $tags ) ) {
                $debates = get_posts( array( 'post_type' => 'debate', 'posts_per_page' => 1 ) );
                if ( count( $debates ) > 0 ) {
                    $levels[] = array( "Debates", site_url( '/debates/' ) );
                }
            }

            restore_current_blog();

            if ( is_home() || is_front_page() ) {
                $levels[] = array( get_bloginfo( 'name' ), );
            } else {
                $levels[] = array( get_bloginfo( 'name' ), get_blog_details( $blog_ID )->siteurl );
            }
        } else {
            $levels[] = array( $home, $homeLink );
        }

        if ( is_category() ) {
            $thisCat = get_category( get_query_var( 'cat' ), false );
            if ( $thisCat->parent != 0 ) {
                foreach ( explode( '|', get_category_parents( $thisCat->parent, true, '|' ) ) as $parent ) {
                    if ( $parent ) {
                        $levels[] = array( $parent );
                    }
                }
            }
            $levels[] = array( single_cat_title( 'categoria ', false ) );

        } elseif ( get_query_var( 'cat' ) === '0' ) {
            $levels[] = array( 'Notícias' );

        } elseif ( is_search() ) {
            $levels[] = array( 'Resultados da procura por "' . get_search_query() . '"' );

        } elseif ( is_day() ) {
            $levels[] = array( get_the_time( 'Y' ), get_year_link( get_the_time( 'Y' ) ) );
            $levels[] = array( get_the_time( 'F' ), get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) );
            $levels[] = array( get_the_time( 'd' ) );

        } elseif ( is_month() ) {
            $levels[] = array( get_the_time( 'Y' ), get_year_link( get_the_time( 'Y' ) ) );
            $levels[] = array( get_the_time( 'F' ) );

        } elseif ( is_year() ) {
            $levels[] = array( get_the_time( 'Y' ) );

        } elseif ( is_single() && ! is_attachment() ) {
            if ( get_post_type() != 'post' ) {
                $post_type = get_post_type_object( get_post_type() );
                $slug      = $post_type->rewrite;
                $levels[]  = array( $post_type->labels->name, $homeLink . '/' . $slug['slug'] . '/' );
                if ( $showCurrent == 1 ) {
                    $levels[] = array( get_the_title() );
                }
            } else {
                $cat = get_the_category();
                $cat = $cat[0];
                foreach ( explode( '|', get_category_parents( $cat, true, '|' ) ) as $parent ) {
                    if ( $parent ) {
                        $levels[] = array( $parent );
                    }
                }
            }

        } elseif ( ! is_single() && ! is_page() && get_post_type() != 'post' && ! is_404() ) {
            $post_type = get_post_type_object( get_post_type() );
            if ( $post_type ) {
                $levels[] = array( $post_type->labels->name );
            }
        } elseif ( is_attachment() ) {
            $parent = get_post( $post->post_parent );
            $cat    = get_the_category( $parent->ID );
            $cat    = $cat[0];

            foreach ( explode( '|', get_category_parents( $cat, true, '|' ) ) as $parent ) {
                if ( $parent ) {
                    $levels[] = array( $parent );
                }
            }
            $levels[] = array( $parent->post_title, get_permalink( $parent ) );

            if ( $showCurrent == 1 ) {
                $levels[] = array( get_the_title() );
            }

        } elseif ( is_page() && ! $post->post_parent ) {
            if ( $showCurrent == 1 ) {
                $levels[] = array( get_the_title() );
            }

        } elseif ( is_page() && $post->post_parent ) {
            $parent_id   = $post->post_parent;
            $breadcrumbs = array();

            while ( $parent_id ) {
                $page          = get_post( $parent_id );
                $breadcrumbs[] = array( get_the_title( $page->ID ), get_permalink( $page->ID ) );
                $parent_id     = $page->post_parent;
            }

            $breadcrumbs = array_reverse( $breadcrumbs );
            $levels      = array_merge( $levels, $breadcrumbs );

            if ( $showCurrent == 1 ) {
                $levels[] = array( get_the_title() );
            }

        } elseif ( is_tag() ) {
            $levels[] = array( single_tag_title( 'Posts com a palavra-chave ', false ) );

        } elseif ( is_author() ) {
            global $author;
            $userdata = get_userdata( $author );
            $levels[] = array( 'Posts criados por ' . $userdata->display_name );

        } elseif ( is_404() ) {
            $levels[] = array( 'Erro 404' );
        }
    }

    return $levels;
}

add_action(
        'wp_ajax_publicacoes_paginacao_infinita',
        'publicacoes_paginacao_infinita'
);
add_action(
        'wp_ajax_nopriv_publicacoes_paginacao_infinita',
        'publicacoes_paginacao_infinita'
);

/* ReWrite para gerar endpoints de notícias e suas subcategorias */
/* ================ REWRITE RULES ================ */
add_action(
        'generate_rewrite_rules', function ( $wp_rewrite ) {
    $new_rules         = array(
            "noticias/([^/]*)/?$" =>
                    "index.php?&category_name=" . $wp_rewrite->preg_index( 1 ),
            "noticias/?$"         =>
                    "index.php?category_name=geral",
            "editais/?$"          =>
                    "index.php?category_name=editais",
    );
    $wp_rewrite->rules = $new_rules + $wp_rewrite->rules;

    return $wp_rewrite;
}
);

add_action(
        'template_redirect', function () {
    global $wp_query;

    $categoria = $wp_query->get( 'category_name' );
    $tpl_fname = __DIR__ . "/noticias.php";

    if ( $categoria && file_exists( $tpl_fname ) ) {

        // Modificação para quando a categoria for geral trazer todos os posts
        if ( $categoria == "geral" ) {
            $args = $wp_query->query_vars;
            unset( $args['category_name'] );
            $args['cat'] = 0;
            query_posts( $args );
        }

        include $tpl_fname;
        die;
    }
}
);

/**
 * Função que cria páginas (pages),
 * em especial focando nos 'endpoints'
 **/
function participacao_create_pages() {

    //Muda para o 'blog 1' (principal) pois é aonde a página de cadastro deve estar
    // Esta mudança é necessária pois a função abaixo seria aplicada aos outros sites
    // ao se ativar um subtema nos subsites, e a página de cadastro pertence ao site 'principal'
    switch_to_blog( '1' );

    //cria a página 'contato' no 'blog principal'
    pd_create_page( array( 'titulo' => 'Contato', 'conteudo' => '[pd_registration_form]' ) );

    //Volta para o 'blog atual'
    restore_current_blog();

}

// Chama a função apenas quando há troca de tema
//   fundamentalmente quando o tema é ativado (e também desativado)
add_action( 'after_switch_theme', 'participacao_create_pages' );


function get_sticky_news( $max = 1 ) {
// Captura o último sticky post se não o ultimo post qualquer
    $args        = array(
            'posts_per_page'      => $max,
            'post__in'            => get_option( 'sticky_posts' ),
            'ignore_sticky_posts' => 1
    );
    $sticky_news = new WP_Query( $args );

    return $sticky_news;
}

function get_latest_categories( $ignore = array() ) {
    $posts = wp_get_recent_posts(
            array(
                    'exclude'     => $ignore,
                    'post_status' => 'publish'
            )
    );

    $categories = array();
    foreach ( $posts as $post ) {
        $postID = $post["ID"];
        $cat    = get_the_category( $post["ID"] );
        if ( $cat && ! in_array( $cat[0]->term_id, $categories ) ) {
            $categories[] = $cat[0]->term_id;
        }
        $ignore[] = $postID;
    }

    return array( $categories, $ignore );
}

function get_latest_news( $ignore = array(), $max_categories = 3, $max_news_per_category = 3 ) {
    $categories    = array();
    $ignoreCat     = $ignore;
    $allCategories = get_categories();

    if ( count( $allCategories ) < $max_categories ) {
        $max_categories = count( $allCategories );
    }

    while ( count( $categories ) < $max_categories ) {
        list( $categories, $ignoreCat ) = get_latest_categories( $ignoreCat );
    }

    $categories = array_slice( $categories, 0, $max_categories );
    foreach ( $categories as $category ) {
        $args = array(
                'posts_per_page' => $max_news_per_category,
                'cat'            => $category,
                'post__not_in'   => $ignore,
        );

        $query = new WP_Query( $args );

        while ( $query->have_posts() ) {
            $query->the_post();
            $ignore[] = get_the_ID();
        }

        $query->rewind_posts();
        $news[ $category ] = $query;
    }

    return $news;
}

function display_sticky_news() {
    $news = get_sticky_news( filter_int_option( 'participacao_max_sticky_news' ) );
    $ids  = array();
    if ( $news->have_posts() ) {
        echo '<ul class="not-list list-unstyled destaques">';
        $isFirstSticky = true; //usada no template content-sticky
        while ( $news->have_posts() ) {
            $news->the_post();
            $ids[] = get_the_ID();
            include( locate_template( 'content-sticky.php' ) );
            $isFirstSticky = false;
        }
        echo '</ul>';
    }

    return $ids;
}

function display_latest_news( $ignore = array() ) {
    $max_categories        = filter_int_option( 'participacao_max_categories_news' );
    $max_news_per_category = filter_int_option( 'participacao_max_news_per_category' );

    $cat_news = get_latest_news( $ignore, $max_categories, $max_news_per_category );

    foreach ( $cat_news as $cat => $news ) {
        if ( $news->have_posts() ) {
            $category = get_category( $cat ); ?>

            <ul class="not-list list-unstyled mt-md">
            <h2 class="not-hat">
                <a href="<?= get_category_link( $category->term_id ); ?>"
                   title="<?= esc_attr( sprintf( __( "Veja todas as notícias em %s" ), $category->name ) ) ?>">
                    <?= $category->cat_name; ?>
                </a>
            </h2>

            <?php

            while ( $news->have_posts() ) {
                $news->the_post();
                get_template_part( 'content', 'noticias_capa' );
            }
            echo '</ul>';
        }
    }
}

function participacao_load_widgets() {
    register_sidebar( array(
            'name'          => 'Barra Lateral',
            'id'            => 'sidebar_widgets',
            'before_widget' => '<div class="panel panel-default">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="panel-heading"><h4 class="red font-roboto">',
            'after_title'   => '</h4></div>',
    ) );

    register_sidebar( array(
            'name'          => 'Barra Lateral Interna',
            'id'            => 'barra-lateral-interna',
            'description'   => 'Itens a serem apresentados na barra lateral nas páginas internas',
            'before_widget' => '<section class="custom-box"><div class="panel panel-default">',
            'after_widget'  => '</div></section>',
            'before_title'  => '<div class="panel-heading"><h4 class="red font-roboto">',
            'after_title'   => '</h4></div>',
    ) );

    require_once get_template_directory() . '/widgets/social-tabs-widget-class.php';
    register_widget( 'social_tabs_widget' );

    if ( ! class_exists( 'Mais_Noticias' ) ) {
        require_once get_template_directory() . '/widgets/class-mais-noticias-widget.php';
    }
    register_widget( 'Mais_Noticias' );

    if ( ! class_exists( 'Video_Widget' ) ) {
        require_once get_template_directory() . '/widgets/class-video-widget.php';
    }
    register_widget( 'Video_Widget' );

    require_once get_template_directory() . '/widgets/class-imagem-widget.php';
    register_widget( 'participacao_imagem_widget' );

    require_once get_template_directory() . '/widgets/class-como-participar-widget.php';
    register_widget( 'participacao_como_participar_widget' );

}

add_action( 'widgets_init', 'participacao_load_widgets' );
