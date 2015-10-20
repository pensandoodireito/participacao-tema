<div class="noticia-destaque">
	<div class="imagem-destaque">
		<?php
		if ( has_post_thumbnail() ) {
			the_post_thumbnail( 'thumbnail' );
		} ?>
	</div>
	<div class="texto-destaque">
		<?php global $isFirstSticky; ?>
		<p class="<?= $isFirstSticky ? 'h3' : 'h4' ?> red">
			<strong>
				<a href="<?php the_permalink(); ?>">
					<?php the_title(); ?>
				</a>
			</strong>
		</p>

		<?php if ( has_excerpt() ) { ?>
			<p><?php the_excerpt(); ?></p>
		<?php } ?>
		<small><?php
			$categories = get_the_category( get_the_ID() );
			$separator  = ' | ';
			$output     = '';
			if ( $categories ) {
				foreach ( $categories as $category ) {
					$output .= '<a href="' . get_category_link( $category->term_id ) . '" title="' . esc_attr( sprintf( __( "Veja todas as notícias em %s" ), $category->name ) ) . '">' . $category->cat_name . '</a>' . $separator;
				}
				echo trim( $output, $separator );
			}
			?></small>
	</div>
</div>