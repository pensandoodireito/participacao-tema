<li>
	<?php $hasThumbnail = has_post_thumbnail() ?>
	<?php $image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' ); ?>

	<article class="not-fill <?= $hasThumbnail && $image_attributes ? 'has-image' : ''; ?>">
		<?php if ( $hasThumbnail && $image_attributes ) { ?>
			<div class="not-image">
				<img src="<?php echo $image_attributes[0]; ?>" class="img-adptive">
			</div>
		<?php } ?>
		<div class="not-text">
			<header class="not-titulo">
				<h3>
					<?php global $isFirstSticky; ?>
					<a href="<?php the_permalink(); ?>" class="<?= $isFirstSticky ? 'destaque-principal' : '' ?>">
						<?php the_title(); ?>
					</a>
				</h3>
			</header>
			<?php if ( has_excerpt() ) { ?>
				<p><?php the_excerpt(); ?></p>
			<?php } ?>

			<?php
			$categories = get_the_category( get_the_ID() );
			$output     = array();
			if ( $categories ) {
				foreach ( $categories as $category ) {
					$output[] = '<a href="' . get_category_link( $category->term_id ) . '" title="' . esc_attr( sprintf( __( "Veja todas as notícias em %s" ), $category->name ) ) . '">' . $category->cat_name . '</a>';
				}
				?>
				<p class="not-tag"><?= implode( ', ', $output ); ?></p>
			<?php } ?>
		</div>
	</article>
</li>