
	<div class="row">
		<div class="col-xs-8 text-left">
		    <h4 class="red"><strong><?php the_title(); ?></strong></h4>
		    <p><mark><?php the_date('d \d\e F \d\e Y'); ?></mark></p>
		    <?php the_content(); ?>
		</div> <!-- /col-xs -->

		<?php get_sidebar(); ?>
	</div>
