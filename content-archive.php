<div class="noticia-normal">
	<div class="imagem-normal">
		<?php
		if ( has_post_thumbnail() ) {
			the_post_thumbnail( array( 90, 90 ) );
		} ?>
	</div>
	<div class="texto-normal">
		<p class="h5 red">
			<strong>
				<a href="<?php the_permalink(); ?>">
					<?php the_title(); ?>
				</a>
			</strong>
		</p>
	</div>
</div>