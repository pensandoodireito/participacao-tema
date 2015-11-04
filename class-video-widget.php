<?php

/**
 * http://www.wpbeginner.com/wp-themes/how-to-add-dynamic-widget-ready-sidebars-in-wordpress/
 */
class Video_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			// Base ID of your widget
			'video_widget',
			// Widget name will appear in UI
			__( 'Vídeo', 'wpb_widget_domain' ),

			// Widget description
			array( 'description' => __( 'Widget que mostra o último vídeo em destaque', 'wpb_widget_domain' ), )
		);
	}

	// Creating widget front-end
	// This is where the action happens
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		// before and after widget arguments are defined by themes

		$params    = array(
			'post_type'      => array( 'video' ),
			'pagination'     => false,
			'posts_per_page' => '1',
			'order'          => 'DESC',
			'meta_query'     => array(
				array(
					'key'     => 'video_destaque',
					'value'   => '1',
					'compare' => '=',
				),
			)
		);
		$the_query = new WP_Query( $params );

		if ( $the_query->have_posts() ) :
			while ( $the_query->have_posts() ) :
				$the_query->the_post();
				$youtube_url = get_post_meta( get_the_ID(), 'video_youtube_url' );
				$url_params  = parse_url( $youtube_url[0] );
				parse_str( $url_params['query'] );
				?>
				<section class="pensando-videos">
					<div class="panel panel-default">
						<div class="panel-body">
							<header><h2><a href="/videos"><?php echo $title; ?></a></h2></header>
							<section class="embed-responsive embed-responsive-16by9 mt-sm">
								<iframe width="100%" height="100%" src="https://www.youtube.com/embed/<?php echo $v; ?>"
								        frameborder="0" allowfullscreen>
								</iframe>
							</section>
							<section class="video-description">
								<h3><a href="<?php the_guid(); ?>"><?php the_title(); ?></a></h3>

								<p><?php the_excerpt(); ?></p>

								<p><a href="https://www.youtube.com/channel/UCTKceQBthsUpwYUcQfD4W8g"
								      class="fontsize-sm" target="_blank">Pensando o Direito no <i
											class="fa fa-youtube"></i> youtube</a></p>
							</section>
						</div>
					</div>
				</section>
			<?php endwhile;
		//end of the loop
		endif;
	}

	// Widget Backend
	public function form( $instance ) {
		if ( isset( $instance['title'] ) ) {
			$title = $instance['title'];
		} else {
			$title = __( 'New title', 'wpb_widget_domain' );
		}
		// Widget admin form
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"
			       name="<?php echo $this->get_field_name( 'title' ); ?>" type="text"
			       value="<?php echo esc_attr( $title ); ?>"/>
		</p>
		<?php
	}

	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance          = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}
}