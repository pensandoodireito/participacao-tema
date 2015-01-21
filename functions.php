<?php

function pensando_get_logged_user() {
    if ( is_user_logged_in() ) {
        $current_user = wp_get_current_user();

        return 'Olá ' . $current_user->display_name . '! <a href="' . wp_logout_url() .'">Logout?</a>';
    }
    else {

        return  '<a href="' . wp_registration_url() .'">Cadastre-se</a> | <a href="' . wp_login_url() .'">Já é cadastrado?</a>';

    }
}