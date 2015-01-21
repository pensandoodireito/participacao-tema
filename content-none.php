
<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title">Sua pesquisa não retornou resultados</h1>
	</header><!-- .page-header -->

	<div class="page-content">

		<?php if ( is_search() ) : ?>

			<p>Talvez você precise modificar os termos da sua pesquisa pra encontrar o que procura.</p>
			<?php get_search_form(); ?>

		<?php endif; ?>

	</div><!-- .page-content -->
</section><!-- .no-results -->
