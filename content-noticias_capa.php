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
					<a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
				</h3>
			</header>
		</div>
	</article>
</li>
