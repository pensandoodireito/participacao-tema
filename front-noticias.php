<div class="noticias mt-md">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-xs-12">
				<?php
				$sticky_posts = display_sticky_news();
				display_latest_news( $sticky_posts );
				?>
				<div class="row text-center">
					<a href="<?php echo site_url( '/noticias' ); ?>" id="mais-noticias" class="btn btn-danger">
						Todas as notícias
					</a>
				</div>
			</div>
			<!-- AGENDA -->
			<div class="col-sm-6 col-xs-12">
				<?php get_template_part('agenda'); ?>
			</div>
		</div>
	</div>
</div>