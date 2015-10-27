<?php get_header(); ?>
	<div class="container" id="debates">
		<div class="row">
			<div class="col-md-12">
				<div class="debate-item anticorrupcao">
					<div class="text-center">
						<a href="<?php echo site_url( "/anticorrupcao" ); ?>"><img
								src="<?php echo get_stylesheet_directory_uri(); ?>/images/logos/logo-anticorrupcao-w.png"
								class="img-adptive mt-lg" alt="Medidas Anticorrupção"></a>
					</div>
					<div class="description">
						<?php
						$page_anticorrupcao = get_page_by_title( 'Medidas Anticorrupção' );
						if ( $page_anticorrupcao != null ) {
							echo $page_anticorrupcao->post_content;
						}
						?>
					</div>
				</div>
				<div class="mt-sm text-center">
					<a href="<?php echo site_url( "/anticorrupcao" ); ?>" class="btn btn-danger font-roboto">Participe
						deste debate!</a>
				</div>
			</div>
		</div>
		<div class="row mt-md">
			<div class="col-md-6">
				<div class="debate-item protecao">
					<div class="text-center">
						<a href="<?php echo site_url( "/dadospessoais" ); ?>"><img
								src="<?php echo get_stylesheet_directory_uri(); ?>/images/logos/protecao-w.png"
								class="img-adptive" alt="Proteção de Dados Pessoais"></a>
					</div>
					<div class="description">
						<?php
						$page_dadospessoais = get_page_by_title( 'Proteção de Dados Pessoais' );
						if ( $page_dadospessoais != null ) {
							echo $page_dadospessoais->post_content;
						}
						?>
					</div>
				</div>
				<div class="mt-sm text-center">
					<a href="<?php echo site_url( "/dadospessoais" ); ?>" class="btn btn-danger font-roboto">Participe
						deste debate!</a>
				</div>
			</div>
			<div class="col-md-6">
				<div class="debate-item marco-civil">
					<div class="text-center">
						<a href="<?php echo site_url( "/marcocivil" ); ?>"><img
								src="<?php echo get_stylesheet_directory_uri(); ?>/images/logos/marcocivil-b.png"
								class="img-adptive" alt="Proteção de Dados Pessoais"></a>
					</div>
					<div class="description">
						<?php
						$page_marcocivil = get_page_by_title( 'Marco Civil da Internet' );
						if ( $page_marcocivil != null ) {
							echo $page_marcocivil->post_content;
						}
						?>
					</div>
				</div>
				<div class="mt-sm text-center">
					<a href="<?php echo site_url( "/marcocivil" ); ?>" class="btn btn-danger font-roboto">Participe da
						Sistematização!</a>
				</div>
			</div>
		</div>
	</div>
<?php get_template_part( 'mini-tutorial' ); ?>
<?php get_footer(); ?>