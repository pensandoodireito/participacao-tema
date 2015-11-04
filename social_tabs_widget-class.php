<?php

class social_tabs_widget extends WP_Widget {

	function __construct() {
		parent::__construct( 'social_tabs_widget', __( 'Social Tabs', 'social_tabs_widget_domain' ),
			array( 'description' => __( 'Widget que exibe as atividades de midias sociais separadas em abas', 'social_tabs_widget_domain' ) ) );
	}

	public function widget( $args, $instance ) { ?>

		<div class="tabs-social">
			<ul id="tabs" class="nav tabs-pd" data-tabs="tabs">
				<?php
				// TODO: Automatizar isso urgente!
				$participacao_settings = get_option( 'participacao_settings' );
				if ( trim( $participacao_settings['participacao_twitter_embed'] ) != "" ) { ?>
					<li class="active">
						<a href="#Twitter" data-toggle="tab" class="font-roboto">Twitter</a>

						<div class="tab-arrow"></div>
					</li>
				<?php }
				if ( trim( $participacao_settings['participacao_facebook_embed'] ) != "" ) { ?>
					<li>
						<a href="#Facebook" data-toggle="tab" class="font-roboto">Facebook</a>

						<div class="tab-arrow"></div>
					</li>
				<?php }
				if ( trim( $participacao_settings['participacao_youtube_embed'] ) != "" ) { ?>
					<li>
						<a href="#Youtube" data-toggle="tab" class="font-roboto">Youtube</a>

						<div class="tab-arrow"></div>
					</li>
				<?php }
				if ( trim( $participacao_settings['participacao_diaspora_embed'] ) != "" ) { ?>
					<li>
						<a href="#Diaspora" data-toggle="tab" class="font-roboto">Diaspora</a>

						<div class="tab-arrow"></div>
					</li>
				<?php } ?>
			</ul>
			<div id="" class="tab-content">
				<?php
				// TODO: Automatizar isso urgente!
				$participacao_settings = get_option( 'participacao_settings' );
				if ( trim( $participacao_settings['participacao_twitter_embed'] ) != "" ) { ?>
					<div class="tab-pane active" id="Twitter">
						<?php echo $participacao_settings['participacao_twitter_embed']; ?>
					</div>
				<?php }
				if ( trim( $participacao_settings['participacao_facebook_embed'] ) != "" ) { ?>
					<div class="tab-pane" id="Facebook">
						<?php echo $participacao_settings['participacao_facebook_embed']; ?>
					</div>
				<?php }
				if ( trim( $participacao_settings['participacao_youtube_embed'] ) != "" ) { ?>
					<div class="tab-pane" id="Youtube">
						<?php echo $participacao_settings['participacao_youtube_embed']; ?>
					</div>
				<?php }
				if ( trim( $participacao_settings['participacao_diaspora_embed'] != "" ) ) { ?>
					<div class="tab-pane" id="Diaspora">
						<?php echo $participacao_settings['participacao_diaspora_embed']; ?>
					</div>
				<?php } ?>
			</div>
		</div>
	<?php }
}