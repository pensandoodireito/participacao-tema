<section class="mt-md">
	<div class="container">
		<div class="row">
			<div class="col-md-7">
				<section class="noticias noticias-home">
					<?php $sticky_posts = display_sticky_news(); ?>
					<?php display_latest_news( $sticky_posts ); ?>
					<a href="/noticias"><strong>Todas as Notícias</strong></a>
				</section>
			</div>
			<div class="col-md-5">
				<?php dynamic_sidebar( 'barra-lateral' ) ?>
			</div>
		</div>
	</div>
</section>