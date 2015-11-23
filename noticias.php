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

$categorias[] = array(
	'name' => 'Todas',
	'link' => '/noticias',
	'slug' => '/noticias'
);

foreach ( $todas_categorias as $category ) {
	if ( ! preg_match( '/^_apagar\w*/', $category->name )
	     && $category->name != 'Sem categoria'
	     && $category->name != '*RECATEGORIZAR'
	) {
		$categorias[] = array(
			'slug' => $category->slug,
			'name' => $category->name,
			'link' => '/noticias/' . $category->slug
		);
	}
}

$categoria_atual        = 'Todas';
$args['posts_per_page'] = get_option( 'posts_per_page' );

if ( get_query_var( 'category_name' ) != 'geral' ) {
	foreach ( $categorias as $cat ) {
		if ( $cat['slug'] == $wp_query->query_vars['category_name'] ) {
			$categoria_atual       = $cat['name'];
			$args['category_name'] = $cat['slug']; //$wp_query->query_vars['categoria'];
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
					<div class="container">
						<ul class="list-inline list-categories">
							<?php foreach ( $categorias as $categoria ) { ?>
								<li class="categories-master">
									<a href="<?php echo $categoria['link']; ?>"
									   class="categorie-link <?php echo $categoria['name'] == $categoria_atual ? 'active-box' : ''; ?>"><?php echo $categoria['name']; ?></a>
								</li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="row mt-md">
			<div class="col-md-8">
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
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
