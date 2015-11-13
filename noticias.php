<?php
/**
 * Template Name: Notícias
 */
get_header();

global $wp_query;
$categorias = array();

$todas_categorias = get_categories(
	array( 'taxonomy' => 'category', 'hide_empty' => 1 )
);

foreach ( $todas_categorias as $category ) {
	if ( ! preg_match( '/^_apagar\w*/', $category->name )
	     && $category->name != 'Sem categoria'
	     && $category->name != '*RECATEGORIZAR'
	) {
		$categorias[ $category->slug ] = $category->name;
	}
}

$categoria_atual = 'Todas';
$args            = $wp_query->query_vars;

if ( get_query_var( 'category_name' ) != 'geral' ) {
	foreach ( $categorias as $slug => $nome ) {
		if ( $slug == $wp_query->query_vars['category_name'] ) {
			$categoria_atual       = $nome;
			$args['category_name'] = $slug; //$wp_query->query_vars['categoria'];
		}
	}
} else {
	unset( $args['category_name'] );
}

$ordinary_news = new WP_Query( $args );

?>
<div class="noticias-all">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="font-roboto red">Notícias</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="header-categories">
					<ul class="list-inline list-categories">
						<li class="categories-master">
							<a href="#" class="categorie-link">Todas</a>
						</li>
						<li class="categories-master">
							<a href="#" class="categorie-link active-box">Assuntos legislativos</a>
						</li>
						<li class="categories-master">
							<a href="#" class="categorie-link">Debates públicos</a>
						</li>
						<li class="categories-master">
							<a href="#" class="categorie-link">Editais</a>
						</li>
						<li class="categories-master">
							<a href="#" class="categorie-link">Vídeos</a>
						</li>
						<li class="dropdown categories-master">
							<a href="#" class="categorie-link" id="menu-mais" data-toggle="dropdown"
							   aria-haspopup="true" aria-expanded="false">Mais <i class="fa fa-caret-down"></i></a>
							<ul class="dropdown-menu" aria-labelledby="menu-mais">
								<li class="categories-master">
									<a href="#" class="categorie-link">Por data</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row mt-md">
			<div class="col-md-7">
				<section class="noticias">
					<?php if ( $ordinary_news->have_posts() ) { ?>
						<ul class="not-list list-unstyled">
							<?php
							while ( $ordinary_news->have_posts() ) {
								$ordinary_news->the_post();
								get_template_part( 'content', 'archive' );
							}
							?>
						</ul>
					<?php } else {
						echo 'Nenhuma notícia encontrada.';
					}
					?>
				</section>
			</div>
		</div>
	</div>

</div>
<?php get_footer(); ?>
