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
					<h4 class="page-title red"><img src="<?php echo get_template_directory_uri(); ?>/images/structure/404.jpg"><?php _e( 'Ops! Não conseguimos encontrar a página que você estava procurando. (erro 404) ', 'twentyfifteen' ); ?></h4>
				</header><!-- .page-header -->

				<div class="page-content">
					<div class="row text-center">
						<form class="form-inline">
						  <div class="form-group">
						    <label><?php _e( 'Use o menu de navegação ou procure o que deseja com a nossa busca: ', 'twentyfifteen' ); ?></label>
						    <?php get_search_form(); ?>
						  </div>
						</form>
					</div>	
				</div>
			</section><!-- .error-404 -->

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
