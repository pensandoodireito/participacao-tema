<?php

add_theme_support( 'post-thumbnails' );

add_image_size( 'noticia-destaque', 555, 290, true );
add_image_size( 'noticia-lista', 214, 137, true );


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

        return  '<a href="' . wp_registration_url() .'">Cadastre-se</a> | <a href="' . wp_login_url() .'">Já é cadastrado?</a>';

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
        $page_participe = get_page_by_title( 'Participe' );

        if ($page_participe != null) {
            return get_page_link( $page_participe->ID );
        } else {
            return "#";
        }
    } else {
        return $link_delibera;
    }
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