<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area container">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h4 class="page-title red"><img src="<?php echo get_template_directory_uri(); ?>/images/structure/404.jpg"><strong><?php _e( 'Página não encontrada.', 'twentyfifteen' ); ?></strong></h4>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php _e( 'Que tal encontrar o que você deseja com a busca?', 'twentyfifteen' ); ?></p>

					<?php get_search_form(); ?>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
