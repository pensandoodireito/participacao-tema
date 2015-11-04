<?php

class Mais_Noticias extends WP_Widget {
	function __construct() {
		parent::__construct(
			'mais_noticias_widget',
			// Widget name will appear in UI
			__( 'Mais notícias', 'wpb_widget_domain' ),

			// Widget description
			array( 'description' => __( 'Mostrar outras notícias na página.', 'wpb_widget_domain' ), )
		);
	}

	public function widget( $args, $instance ) {
		$mais_noticias = new WP_Query(
			array(
				'post_type'      => array( 'post' ),
				'posts_per_page' => $instance['quantidade'] - 1,
				'post__not_in'   => array( get_the_ID() )
			)
		);
		echo $args['before_widget'];
		echo "{$args['before_title']}{$instance['title']}{$args['after_title']}";
		?>
		<div class="panel-body">
			<?php
			while ( $mais_noticias->have_posts() ) {
				$mais_noticias->the_post();
				?>
				<div class="row mb-md">
					<div class="col-xs-5">
						<?php
						if ( has_post_thumbnail() ) {
							the_post_thumbnail( 'noticia-lista', array( 'class' => "img-adptive" ) );
						}
						?>
					</div>
					<div class="col-xs-7 pl-0">
						<p class="h6 red mt-0">
							<strong>
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</strong>
						</p>
					</div>
				</div>
				<?php
			}
			wp_reset_query(); ?>
		</div>
		<?php
		echo $args['after_widget'];
	}

	// Widget Backend
	public function form( $instance ) {
		if ( isset( $instance['title'] ) ) {
			$title = $instance['title'];
		} else {
			$title = __( 'Mais notícias', 'wpb_widget_domain' );
		}
		if ( isset( $instance['quantidade'] ) ) {
			$quantidade = $instance['quantidade'];
		} else {
			$quantidade = 5;
		}
		// Widget admin form
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"
			       name="<?php echo $this->get_field_name( 'title' ); ?>" type="text"
			       value="<?php echo esc_attr( $title ); ?>"/>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'quantidade' ); ?>"><?php _e( 'Quantidade:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'quantidade' ); ?>"
			       name="<?php echo $this->get_field_name( 'quantidade' ); ?>" type="text"
			       value="<?php echo esc_attr( $quantidade ); ?>"/>
		</p>
		<?php
	}

	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance               = array();
		$instance['title']      = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['quantidade'] = ( ! empty( $new_instance['quantidade'] ) ) ? (int) $new_instance['quantidade'] : 5;

		return $instance;
	}
}