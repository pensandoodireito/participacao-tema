<?php

add_theme_support( 'post-thumbnails' );

add_image_size( 'noticia-destaque', 555, 290, true );
add_image_size( 'noticia-lista', 214, 137, true );

function pensandoodireito_scripts() {
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap/bootstrap.min.js' , array('jquery'), false, true );
    wp_enqueue_script( 'pensandoodireito', get_template_directory_uri() . '/js/pensandoodireito.js' , array('jquery', 'bootstrap'), false, true );
}

add_action( 'wp_enqueue_scripts', 'pensandoodireito_scripts' );

/**
 * Retorna o bloco de texto para usuários logados ou não, com
 * seus respectivos links de cadastro, login e logout.
 *
 * @return string
 */
function pensando_get_logged_user() {
    if ( is_user_logged_in() ) {
        $current_user = wp_get_current_user();

        return 'Olá ' . $current_user->display_name . '! <a href="' . wp_logout_url() .'">Logout?</a>';
    }
    else {

        return  '<a href="' . wp_registration_url() .'">Cadastre-se</a> | <a data-target="#wp-login-modal" data-toggle="modal" href="' . wp_login_url($_SERVER['REQUEST_URI']) .'">Faça seu login</a>';

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
function pensando_get_participe_link() {
    $link_delibera = get_post_type_archive_link('pauta');

    if ($link_delibera == "") {
        $page_participe = pensando_get_participe_page();

        if ($page_participe != null) {
            return get_page_link( $page_participe->ID );
        } else {
            return "#";
        }
    } else {
        return $link_delibera;
    }
}

function pensando_get_participe_page() {

    return get_page_by_path( '/participe' );

}

/**
 * Função para retornar o aviso de cadastro dentro do mini-tutorial
 *
 * @return string
 */
function pensando_get_cadastrase_minitutorial() {
    if ( is_user_logged_in() ) {
        $current_user = wp_get_current_user();

        return 'Olá ' . $current_user->display_name . '!';
    }
    else {

        return  'Se não é cadastrada(o): <a href="' . wp_registration_url() .'">cadastre-se</a>';
    }

}

add_action( 'admin_menu', 'pensandoodireito_add_admin_menu' );
add_action( 'admin_init', 'pensandoodireito_settings_init' );

/**
 * Adiciona o link para a página de opções do tema no menu
 */
function pensandoodireito_add_admin_menu(  ) {

    add_options_page( 'Tema Pensando o Direito', 'Tema Pensando o Direito', 'manage_options', 'pensandoodireito-tema', 'pensandoodireito_options_page' );

}

/**
 * Inicia os campos das opções do tema
 */
function pensandoodireito_settings_init(  ) {

    register_setting( 'pluginPage', 'pensandoodireito_settings' );

    add_settings_section(
        'pensandoodireito_pluginPage_section',
        'Opções do tema Pensando o Direito',
        'pensandoodireito_settings_section_callback',
        'pluginPage'
    );

    add_settings_field(
        'pensandoodireito_twitter_embed',
        'Código do widget do Twitter (usar altura máxima de 350px)',
        'pensandoodireito_twitter_render',
        'pluginPage',
        'pensandoodireito_pluginPage_section'
    );

    add_settings_field(
        'pensandoodireito_facebook_embed',
        'Código do widget do Facebook (usar altura máxima de 350px)',
        'pensandoodireito_facebook_render',
        'pluginPage',
        'pensandoodireito_pluginPage_section'
    );

    add_settings_field(
        'pensandoodireito_identica_embed',
        'Código do widget do Identica (usar altura máxima de 350px)',
        'pensandoodireito_identica_render',
        'pluginPage',
        'pensandoodireito_pluginPage_section'
    );

    add_settings_field(
        'pensandoodireito_diaspora_embed',
        'Código do widget do Diaspora (usar altura máxima de 350px)',
        'pensandoodireito_diaspora_render',
        'pluginPage',
        'pensandoodireito_pluginPage_section'
    );


}

/**
 * Render do campo para o widget do Twitter
 */
function pensandoodireito_twitter_render(  ) {

    $options = get_option( 'pensandoodireito_settings' );
    ?>
    <textarea cols='40' rows='5' name='pensandoodireito_settings[pensandoodireito_twitter_embed]'>
        <?php echo $options['pensandoodireito_twitter_embed']; ?>
    </textarea>
<?php

}


function pensandoodireito_facebook_render(  ) {

    $options = get_option( 'pensandoodireito_settings' );
    ?>
    <textarea cols='40' rows='5' name='pensandoodireito_settings[pensandoodireito_facebook_embed]'>
        <?php echo $options['pensandoodireito_facebook_embed']; ?>
    </textarea>
<?php

}


function pensandoodireito_identica_render(  ) {

    $options = get_option( 'pensandoodireito_settings' );
    ?>
    <textarea cols='40' rows='5' name='pensandoodireito_settings[pensandoodireito_identica_embed]'>
        <?php echo $options['pensandoodireito_identica_embed']; ?>
    </textarea>
<?php

}


function pensandoodireito_diaspora_render(  ) {

    $options = get_option( 'pensandoodireito_settings' );
    ?>
    <textarea cols='40' rows='5' name='pensandoodireito_settings[pensandoodireito_diaspora_embed]'>
        <?php echo $options['pensandoodireito_diaspora_embed']; ?>
    </textarea>
<?php

}


function pensandoodireito_settings_section_callback(  ) {

    echo 'Configurações do tema';

}


function pensandoodireito_options_page(  ) {

    ?>
    <form action='options.php' method='post'>

        <h2>Pensando o Direito</h2>

        <?php
        settings_fields( 'pluginPage' );
        do_settings_sections( 'pluginPage' );
        submit_button();
        ?>

    </form>
<?php

}

add_action( 'signup_extra_fields', 'pensandoodireito_formulario_registro' );

/**
 * Inclusão de campos extras no registro do WordPress
 */
function pensandoodireito_formulario_registro($errors) {

    $nice_name = ( ! empty( $_POST['nice_name'] ) ) ? trim( $_POST['nice_name'] ) : '';

    ?>
        <label for="nice_name">Nome de apresentação</label>
            <input type="text" name="nice_name" id="nice_name" value="<?php echo esc_attr( wp_unslash( $nice_name ) ); ?>" size="25" /><br/>
        Esse nome será usado em todos os seus comentários públicos.

        <label for="termos_uso">
            <input type="checkbox" name="termos_uso" id="termos_uso" class="checkbox" />
            Li e aceito os <a href="#">termos de uso</a>
        </label>
        <?php if ( $errmsg = $errors->get_error_message('termos_uso') ) { ?>
            <p class="error"><?php echo $errmsg ?></p>
        <?php } ?>
<?php
}

add_filter( 'add_signup_meta', 'pensandoodireito_salvar_meta' );

/**
 * Salva os campos extras
 * @param $user_id
 */
function pensandoodireito_salvar_meta( $meta ) {
    if ( ! empty( $_POST['nice_name'] ) ) {
        $meta['nice_name'] = trim( $_POST['nice_name'] ) ;
    }

    return $meta;
}

add_action('wpmu_activate_user', 'pensandoodireito_salvar_campos_usuario', 10, 3 );

/**
 * Persiste os campos especiais salvos no signup
 *
 * @param $user_id
 * @param $password
 * @param $meta
 */
function pensandoodireito_salvar_campos_usuario ($user_id, $password, $meta) {

    update_user_meta($user_id, 'nickname', $meta['nice_name']);
    wp_update_user( array ('ID' => $user_id, 'display_name' => $meta['nice_name']));

}

add_filter( 'wpmu_validate_user_signup', 'pensandoodireito_validacao', 10, 3 );

/**
 * Validação dos campos extras
 *
 * @param $errors
 * @param $sanitized_user_login
 * @param $user_email
 * @return mixed
 */
function pensandoodireito_validacao( $result ) {

    if ( !isset( $_POST['termos_uso']) || empty( $_POST['termos_uso'] ) ) {
        $result['errors']->add( 'termos_uso', 'Você precisa aceitar os termos de uso para se registrar na plataforma.' );
    }

    return $result;
}

add_action( 'init', 'pensandoodireito_habilitar_resumo' );

/**
 * Habilitar resumo para páginas
 */
function pensandoodireito_habilitar_resumo() {
    add_post_type_support( 'page', 'excerpt' );
}

add_action( 'get_header', 'pensandoodireito_remover_style_signup' );

function pensandoodireito_remover_style_signup() {
    remove_action( 'wp_head', 'wpmu_signup_stylesheet' );
}
