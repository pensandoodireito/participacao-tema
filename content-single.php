<div class="row noticias">
	<div class="col-md-8">
		<section class="noticias-internas">
			<header class="mt-md">
				<p class="top-noticias fontsize-sm mb-md">
                <span class="text-muted">
                    <?php the_date( 'd \d\e F \d\e Y' ); ?>
                </span>
                <span class="divider-left">Tópicos:
	                <?php
	                $categories = get_the_category( get_the_ID() );
	                $separator  = ', ';
	                $output     = '';
	                if ( $categories ) {
		                foreach ( $categories as $category ) {
			                $output .= '<a href="' . get_category_link( $category->term_id ) . '" title="' . esc_attr( sprintf( __( "Veja todas as notícias em %s" ), $category->name ) ) . '">' . $category->cat_name . '</a>' . $separator;
		                }
		                echo trim( $output, $separator );
	                }
	                ?>
                </span>
				</p>

				<h1 class="red mt-md not-titulo">
					<strong>
						<?php the_title(); ?>
					</strong>
				</h1>

				<?php if ( has_excerpt() ) { ?>
					<h4 class="not-sutien">
						<?php the_excerpt(); ?>
					</h4>
				<?php } ?>
			</header>
			<article class="mt-md">
				<?php the_content(); ?>
			</article>
		</section>
	</div>
	<div class="col-md-4">
		<?php get_sidebar(); ?>
	</div>
</div>