<?php

/**
 * http://www.wpbeginner.com/wp-themes/how-to-add-dynamic-widget-ready-sidebars-in-wordpress/
 */

if ( ! class_exists( 'simple_html_dom_node' ) ) {
	require_once "class/simple_html_dom.php";
}

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

	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		// before and after widget arguments are defined by themes
		$sticky = get_option( 'sticky_posts' );
		//$posts  = get_posts('numberposts=1&orderby=post_date&order=DESC&post_format=post-format-video');

		$params    = array(
			'pagination'             => false,
			'posts_per_page'         => '1',
			'posts_per_archive_page' => '1',
			'post__in'               => $sticky,
			'post_type'              => 'post',
			'post_status'            => 'publish',
			'tax_query'              => array(
				array(
					'taxonomy' => 'post_format',
					'field'    => 'slug',
					'terms'    => array( 'post-format-video' )
				)
			)
		);
		$the_query = new WP_Query( $params );

		if ( $the_query->have_posts() && isset( $sticky[0] ) ) :
			$the_query->the_post();

			$postContent = $this->filter_text( get_the_content() );
			$videoID     = $this->get_video_id( $postContent );

			if ( $videoID ) { ?>
				<section class="pensando-videos">
					<div class="panel panel-default">
						<div class="panel-body">
							<header><h2><?php echo $title; ?></h2></header>
							<section class="embed-responsive embed-responsive-16by9 mt-sm">
								<iframe width="100%" height="100%"
								        src="https://www.youtube.com/embed/<?php echo $videoID; ?>"
								        frameborder="0" allowfullscreen>
								</iframe>
							</section>
							<section class="video-description">
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

								<p><?php the_excerpt(); ?></p>

								<p><a href="https://www.youtube.com/channel/UCTKceQBthsUpwYUcQfD4W8g"
								      class="fontsize-sm" target="_blank">Pensando o Direito no <i
											class="fa fa-youtube"></i> youtube</a></p>
							</section>
						</div>
					</div>
				</section>
				<?php
			}
		endif;
	}

	// Creating widget front-end
	// This is where the action happens

	private function get_embed_content( $content ) {
		$dom = str_get_html( $content );
		if ( $dom->find( 'iframe' ) ) {
			foreach ( $dom->find( 'iframe' ) as $iframe ) {
				if ( strpos( $iframe->src, 'youtube.com' ) !== false ) {
					return $iframe->src;
				}
			}
		}

		return false;
	}

	function filter_text( $text ) {
		$patterns  = array( '/</', '/>/', '/"/', '/\'/' );
		$cleanText = preg_replace( $patterns, " ", $text );

		return $cleanText;
	}

	function get_video_id( $text ) {
		preg_match( '~
        https?://         # Required scheme. Either http or https.
        (?:[0-9A-Z-]+\.)? # Optional subdomain.
        (?:               # Group host alternatives.
          youtu\.be/      # Either youtu.be,
        | youtube         # or youtube.com or
          (?:-nocookie)?  # youtube-nocookie.com
          \.com           # followed by
          \S*             # Allow anything up to VIDEO_ID,
          [^\w\s-]       # but char before ID is non-ID char.
        )                 # End host alternatives.
        ([\w-]{11})      # $1: VIDEO_ID is exactly 11 chars.
        (?=[^\w-]|$)     # Assert next char is non-ID or EOS.
        (?!               # Assert URL is not pre-linked.
          [?=&+%\w.-]*    # Allow URL (query) remainder.
          (?:             # Group pre-linked alternatives.
            [\'"][^<>]*>  # Either inside a start tag,
          | </a>          # or inside <a> element text contents.
          )               # End recognized pre-linked alts.
        )                 # End negative lookahead assertion.
        [?=&+%\w.-]*        # Consume any URL (query) remainder.
        ~ix', $text, $matches );

		if ( $matches ) {
			return $matches[1];
		}

		return null;
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