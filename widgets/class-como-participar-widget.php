<?php

class Participacao_Como_Participar_Widget extends WP_Widget {

	function __construct() {
		parent::__construct( 'participacao_como_participar_widget', __( 'Como Participar?', 'participacao-tema' ),
			array( 'description' => __( 'Exibe o passo a passo de como participar dos debates', 'participacao-tema' ) ) );
	}

	public function widget( $args, $instance ) {
		get_template_part( 'mini-tutorial' );
	}

}