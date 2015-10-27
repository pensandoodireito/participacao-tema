<div class="col-sm-6 col-xs-12 line-4">
	<div class="row  mt-md">
		<?php if ( has_post_thumbnail() ) : $col_size = 'col-xs-7'; ?>
			<div class="col-xs-5">
				<?php the_post_thumbnail( 'noticia-lista', array( 'class' => "img-adptive" ) ); ?>
			</div>
		<?php else: $col_size = 'col-xs-12'; endif; ?>
		<div class="<?php echo $col_size; ?> pl-0">
			<p class="h6 red mt-0">
				<strong>
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</strong>
			</p>
			<small><?php the_time( 'd \d\e F \d\e Y' ); ?></small>
			|
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
</div>
