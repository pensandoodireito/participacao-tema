<?php

add_theme_support( 'post-thumbnails' );

add_image_size( 'noticia-destaque', 555, 290, true );
add_image_size( 'noticia-lista', 214, 137, true );

function participacao_scripts() {
    global $wp_query;

    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap/bootstrap.min.js' , array('jquery'), false, true );
    wp_enqueue_script( 'participacao', get_template_directory_uri() . '/js/participacao.js' , array('jquery', 'bootstrap'), false, true );

    $participacao_data = array(
                                'ajaxurl' => admin_url('admin-ajax.php'),
                                'paginaAtual' => 2,
                                'ajaxgif' => get_template_directory_uri() . '/images/ajax-loader.gif',
                                'isHome' => is_home() ? 'true' : 'false',
                                'paginasMaximas' => $wp_query->max_num_pages
                                );

    wp_localize_script( 'participacao', 'participacao', $participacao_data );
}

add_action( 'wp_enqueue_scripts', 'participacao_scripts' );

/**
 * Retorna o bloco de texto para usuários logados ou não, com
 * seus respectivos links de cadastro, login e logout.
 *
 * @return string
 */
function participacao_get_logged_user() {
    if ( is_user_logged_in() ) {
        $current_user = wp_get_current_user();

        return 'Olá ' . $current_user->display_name . '! <a href="' . wp_logout_url() .'">Logout?</a>';
    }
    else {

        return  '<a href="' . wp_registration_url() .'">Cadastre-se</a> | <a href="' . wp_login_url($_SERVER['REQUEST_URI']) .'">Faça seu login</a>';

    }
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
    $link_delibera = get_post_type_archive_link('pauta');

    if ($link_delibera == "") {
        $page_participe = participacao_get_participe_page();

        if ($page_participe != null) {
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
    }
    else {

        return  'Se não é cadastrada(o): <a href="' . wp_registration_url() .'">cadastre-se</a>';
    }

}

add_action( 'admin_menu', 'participacao_add_admin_menu' );
add_action( 'admin_init', 'participacao_settings_init' );

/**
 * Adiciona o link para a página de opções do tema no menu
 */
function participacao_add_admin_menu(  ) {

    add_options_page( 'Outras opções', 'Outras opções', 'manage_options', 'participacao-tema', 'participacao_options_page' );

}

/**
 * Inicia os campos das opções do tema
 */
function participacao_settings_init(  ) {

    register_setting( 'pluginPage', 'participacao_settings' );

    add_settings_section(
        'participacao_pluginPage_section',
        'Opções do tema ' . get_bloginfo('name'),
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
        'participacao_site_excerpt',
        'Resumo da descrição do debate para capa',
        'participacao_site_excerpt_render',
        'pluginPage',
        'participacao_pluginPage_section'
    );

    add_settings_field(
        'participacao_data_abertura',
        'Data de abertura do Debate',
        'participacao_data_abertura_render',
        'pluginPage',
        'participacao_pluginPage_section'
    );

    add_settings_field(
        'participacao_data_encerramento',
        'Data de encerramento do Debate',
        'participacao_data_encerramento_render',
        'pluginPage',
        'participacao_pluginPage_section'
    );

    add_settings_field(
        'participacao_fase_debate',
        'Fase do Debate',
        'participacao_fase_debate_render',
        'pluginPage',
        'participacao_pluginPage_section'
    );

    add_settings_field(
        'participacao_normas',
        'Normas em discussão',
        'participacao_normas_render',
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


}

/**
 * Render do campo para logo
 */
function participacao_sitelogo_render(  ) {

    $options = get_option( 'participacao_settings' );
    ?>
    <input type="hidden" id="logo_url" name="participacao_settings[logo]" value="<?php echo esc_url( $options['logo'] ); ?>" />
    <input id="upload_logo_button" type="button" class="button" value="Escolher/trocar uma imagem" />
<?php

}

/**
 * Render da previsualização da logo
 */
function participacao_sitelogo_preview_render() {
    $options = get_option( 'participacao_settings' );  ?>
    <div id="upload_logo_preview" style="min-height: 100px;">
        <img style="max-width:100%; <?php echo (!isset($options['logo']) ? "display: none;" : ""); ?>"  src="<?php echo esc_url( $options['logo'] ); ?>" />
    </div>
<?php
}

/**
 * Render do campo para o resumo da descrição do site
 */
function participacao_site_excerpt_render(  ) {

    $options = get_option( 'participacao_settings' );
    ?>
    <textarea cols='20' rows='2' name='participacao_settings[participacao_site_excerpt]'>
        <?php echo $options['participacao_site_excerpt']; ?>
    </textarea>
<?php

}

/**
 * Render do campo para a data de abertura do debate
 */
function participacao_data_abertura_render(  ) {

    $options = get_option( 'participacao_settings' );
    ?>
    <input class="regular-text" type="text" cols='20' name='participacao_settings[participacao_data_abertura]' value="<?php echo $options['participacao_data_abertura']; ?>"/>
<?php
}

/**
 * Render do campo para a data de encerramento do debate
 */
function participacao_data_encerramento_render(  ) {

    $options = get_option( 'participacao_settings' );
    ?>
    <input class="regular-text" type="text" cols='20' name='participacao_settings[participacao_data_encerramento]' value="<?php echo $options['participacao_data_encerramento']; ?>"/>
<?php
}

/**
 * Render do campo para a fase atual do debate
 */
function participacao_fase_debate_render(  ) {

    $options = get_option( 'participacao_settings' );
    ?>
    <input class="regular-text" type="text" cols='20' name='participacao_settings[participacao_fase_debate]' value="<?php echo $options['participacao_fase_debate']; ?>"/>
<?php
}

/**
 * Render do campo para a lei referida no debate
 */
function participacao_normas_render(  ) {

    $options = get_option( 'participacao_settings' );
    ?>
    <input class="regular-text" type="text" cols='20' name='participacao_settings[participacao_normas]' value="<?php echo $options['participacao_normas']; ?>"/>
<?php
}

/**
 * Render do campo para o widget do Twitter
 */
function participacao_twitter_render(  ) {

    $options = get_option( 'participacao_settings' );
    ?>
    <textarea cols='40' rows='5' name='participacao_settings[participacao_twitter_embed]'>
        <?php echo $options['participacao_twitter_embed']; ?>
    </textarea>
<?php

}


function participacao_facebook_render(  ) {

    $options = get_option( 'participacao_settings' );
    ?>
    <textarea cols='40' rows='5' name='participacao_settings[participacao_facebook_embed]'>
        <?php echo $options['participacao_facebook_embed']; ?>
    </textarea>
<?php

}


function participacao_youtube_render(  ) {

    $options = get_option( 'participacao_settings' );
    ?>
    <textarea cols='40' rows='5' name='participacao_settings[participacao_youtube_embed]'>
        <?php echo $options['participacao_youtube_embed']; ?>
    </textarea>
<?php

}


function participacao_diaspora_render(  ) {

    $options = get_option( 'participacao_settings' );
    ?>
    <textarea cols='40' rows='5' name='participacao_settings[participacao_diaspora_embed]'>
        <?php echo $options['participacao_diaspora_embed']; ?>
    </textarea>
<?php

}

function participacao_options_page(  ) {

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

add_action('admin_enqueue_scripts', 'participacao_options_enqueue_scripts');
function participacao_options_enqueue_scripts() {
    wp_register_script( 'participacao-upload', get_template_directory_uri() .'/js/participacao-upload.js', array('jquery','media-upload','thickbox') );

    if ( 'settings_page_participacao-tema' == get_current_screen()-> id ) {
        wp_enqueue_script('jquery');

        wp_enqueue_script('thickbox');
        wp_enqueue_style('thickbox');

        wp_enqueue_script('media-upload');
        wp_enqueue_script('participacao-upload');

    }

}

add_action( 'admin_init', 'participacao_sitelogo_option_setup' );

function participacao_sitelogo_option_setup() {
    global $pagenow;

    if ( 'media-upload.php' == $pagenow || 'async-upload.php' == $pagenow ) {
        add_filter( 'gettext', 'participacao_sitelogo_change_text'  , 1, 3 );
    }
}

function participacao_sitelogo_change_text($translated_text, $text, $domain) {
    if ('Insert into Post' == $text) {
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
function participacao_formulario_registro($errors) {

    $nice_name = ( ! empty( $_POST['nice_name'] ) ) ? trim( $_POST['nice_name'] ) : '';

    ?>
        <label for="nice_name">Nome de apresentação</label>
            <input type="text" name="nice_name" id="nice_name" value="<?php echo esc_attr( wp_unslash( $nice_name ) ); ?>" size="25" /><br/>
        Esse nome será usado em todos os seus comentários públicos.

        <label for="termos_uso">
            <input type="checkbox" name="termos_uso" id="termos_uso" class="checkbox" />
            Li e aceito os <a href="<?php echo get_permalink( get_page_by_path('/termos-de-uso') ); ?>" target="_blank">termos de uso</a>.
        </label>
        <?php if ( $errmsg = $errors->get_error_message('termos_uso') ) { ?>
            <p class="error"><?php echo $errmsg ?></p>
        <?php } ?>
<?php
}

add_filter( 'add_signup_meta', 'participacao_salvar_meta' );

/**
 * Salva os campos extras
 * @param $user_id
 */
function participacao_salvar_meta( $meta ) {
    if ( ! empty( $_POST['nice_name'] ) ) {
        $meta['nice_name'] = trim( $_POST['nice_name'] ) ;
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
 * @return mixed
 */
function participacao_validacao( $result ) {

    if ( !isset( $_POST['termos_uso']) || empty( $_POST['termos_uso'] ) ) {
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
function participacao_paginacao_infinita(){
    global $wp_query;

    $paged = $_POST['paged'];

    $args = array(
        'paged' => $paged,
        'posts_per_page' => get_option('posts_per_page'),
        'post__not_in' => get_option('sticky_posts')
    );

    if (isset($_POST['cat'])) {
        $args['category_name'] = $_POST['cat'];
    }

    $ordinary_news = new WP_Query($args);

    if ($ordinary_news->have_posts()) {
        while ($ordinary_news->have_posts()) {
            $ordinary_news->the_post();
            get_template_part('content','archive');
        }
    }

    exit;
}

add_action('wp_ajax_participacao_paginacao_infinita', 'participacao_paginacao_infinita');
add_action('wp_ajax_nopriv_participacao_paginacao_infinita', 'participacao_paginacao_infinita');

/* MENUS DO TEMA PRINCIPAL */
// Menu principal, que fica abaixo da barra 'vermelha' aonde tem a busca
function register_menu_primario() {
  register_nav_menu('menu-primario', __('Menu Primário'));
}
add_action('init', 'register_menu_primario');
// Menu secundário, que fica logo abaixo da "barra Brasil"
function register_menu_secundario() {
  register_nav_menu('menu-secundario', __('Menu Secundário'));
}
add_action('init', 'register_menu_secundario');

// Modifica a formatação de um item de menu para adicionar a description
function add_description_to_menu($item_output, $item, $depth, $args) {
    if ($args->theme_location == 'menu-primario') {
        $item_output = '<div class="navegacao-destaque-content">';
        $item_output .= sprintf('<h5><a href="%s">%s</a></h5>', esc_html($item->url), esc_html($item->title));
        $item_output .= sprintf('<p><a href="%s">%s</a></p>', esc_html($item->url), esc_html($item->description));
        $item_output .= '</div>';
    }

    return $item_output;
}
add_filter('walker_nav_menu_start_el', 'add_description_to_menu', 1, 4);

/* BREADCRUMB */
function wp_custom_breadcrumbs() {

    $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
    $delimiter = '<i class="fa fa-angle-right text-muted"></i>'; // delimiter between crumbs
    $home = '<i class="fa fa-home fa-lg"></i>'; // text for the 'Home' link
    $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
    $before = '<span class="current text-muted">'; // tag before the current crumb
    $after = '</span>'; // tag after the current crumb

    global $post;
    $homeLink = get_bloginfo('url');

    $blog_ID = get_current_blog_id();

    if ( (is_home() || is_front_page()) && $blog_ID == 1 ) {

        if ($showOnHome == 1) echo '<div id="crumbs red"><a href="' . $homeLink . '" class="red">' . $home . '</a></div>';

    } else {
        echo '<div id="crumbs red">';

        if ( $blog_ID != 1 ) {
            switch_to_blog(1);

            echo '<a href="' . get_site_url() . '" class="red">' . $home . '</a> ' . $delimiter . ' ';

            $debates = get_posts(array('post_type' => 'debate', 'posts_per_page' => 1));
            if (count($debates) > 0) {
                echo '<a href="' . site_url('/debates/') . '" class="red">Debates</a> ' . $delimiter . ' ';
            }

            restore_current_blog();

            if ( is_home() || is_front_page() ) {
                echo bloginfo('name') . ' ';
            } else {
                echo '<a href="' . get_blog_details($blog_ID)->siteurl . '" class="red">';
                echo bloginfo('name') . '</a> ' . $delimiter . ' ';
            }
        } else {
            echo '<a href="' . $homeLink . '" class="red">' . $home . '</a> ' . $delimiter . ' ';
        }

        if ( is_category() ) {
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
            echo $before . 'categoria "' . single_cat_title('', false) . '"' . $after;

        } elseif (get_query_var('cat') === '0') {
            echo $before . 'Notícias' . $after;
        } elseif ( is_search() ) {
            echo $before . 'Resultados da procura por "' . get_search_query() . '"' . $after;

        } elseif ( is_day() ) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '" class="red">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '" class="red">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('d') . $after;

        } elseif ( is_month() ) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '" class="red">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('F') . $after;

        } elseif ( is_year() ) {
            echo $before . get_the_time('Y') . $after;

        } elseif ( is_single() && !is_attachment() ) {
            if ( get_post_type() != 'post' ) {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/" class="red">' . $post_type->labels->name . '</a>';
                if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
            } else {
                $cat = get_the_category(); $cat = $cat[0];
                $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
                if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
                echo $cats;
                if ($showCurrent == 1) echo $before . get_the_title() . $after;
            }

        } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
            $post_type = get_post_type_object(get_post_type());
            echo $before . $post_type->labels->name . $after;

        } elseif ( is_attachment() ) {
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID); $cat = $cat[0];
            echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
            echo '<a href="' . get_permalink($parent) . '" class="red">' . $parent->post_title . '</a>';
            if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;

        } elseif ( is_page() && !$post->post_parent ) {
            if ($showCurrent == 1) echo $before . get_the_title() . $after;

        } elseif ( is_page() && $post->post_parent ) {
            $parent_id  = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_post($parent_id);
                $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '" class="red">' . get_the_title($page->ID) . '</a>';
                $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '" class="red">' . get_the_title($page->ID) . '</a>';
                $parent_id  = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            for ($i = 0; $i < count($breadcrumbs); $i++) {
                echo $breadcrumbs[$i];
                if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';
            }
            if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;

        } elseif ( is_tag() ) {
            echo $before . 'Posts com a palavra-chave "' . single_tag_title('', false) . '"' . $after;

        } elseif ( is_author() ) {
            global $author;
            $userdata = get_userdata($author);
            echo $before . 'Posts criados por ' . $userdata->display_name . $after;

        } elseif ( is_404() ) {
            echo $before . 'Error 404' . $after;
        }

        echo '</div>';

    }
} // end wp_custom_breadcrumbs()

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
    'generate_rewrite_rules',  function ($wp_rewrite) {
        $new_rules = array(
        "noticias/([^/]*)/?$" =>
            "index.php?&category_name=" . $wp_rewrite->preg_index(1),
        "noticias/?$" =>
            "index.php?category_name=geral",
        "editais/?$" =>
            "index.php?category_name=editais",
          );
        $wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
        return $wp_rewrite;
    }
);

add_action(
    'template_redirect', function () {
        global $wp_query;

        $categoria = $wp_query->get('category_name');
        $tpl_fname = __DIR__."/noticias.php";

        if ($categoria && file_exists($tpl_fname)) {

            // Modificação para quando a categoria for geral trazer todos os posts
            if ($categoria == "geral") {
                $args = $wp_query->query_vars;
                unset($args['category_name']);
                $args['cat'] = 0;
                query_posts($args);
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
    switch_to_blog('1');

    //cria página 'cadastro' no 'blog principal'
    pd_create_page( array('titulo' => 'Cadastro', 'conteudo' => '[pd_registration_form]') );
    //cria a página 'contato' no 'blog principal'
    pd_create_page( array('titulo' => 'Contato', 'conteudo' => '[pd_registration_form]') );

    //Volta para o 'blog atual'
    restore_current_blog();

}

// Chama a função apenas quando há troca de tema
//   fundamentalmente quando o tema é ativado (e também desativado)
add_action('after_switch_theme', 'participacao_create_pages');
