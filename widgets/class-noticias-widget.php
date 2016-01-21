<?php

/**
 * Created by PhpStorm.
 * User: josafafilho
 * Date: 1/14/16
 * Time: 22:44
 */
class Participacao_Noticias_Widget extends WP_Widget{

	function __construct() {
		parent::__construct( 'participacao_noticias_widget', __( 'Notícias', 'participacao-tema' ),
			array( 'description' => __( 'Exibe os destaques e as últimas notícias separadas por categorias. Também inclui uma área que aceita outros widgets através da Barra Lateral', 'participacao-tema' ) ) );
	}

	public function widget( $args, $instance ) {
		get_template_part( 'front', 'noticias' );
	}
}