<?php get_header(); ?>
        <div class="container">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet cursus metus, nec feugiat sablandit diam facilisis. </p>
            <div class="row mt-md" id="debates">
                <div class="col-md-6">
                    <div class="debate-item protecao">
                        <div class="text-center">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logos/protecao-w.png" class="img-responsive" alt="Proteção de Dados Pessoais">
                        </div>
                        <div class="description">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet cursus metus, nec feugiat sablandit diam facilisis. </p>
                        </div>
                    </div>
                    <div class="mt-sm text-center">
                        <a href="<?php echo site_url("/dadospessoais"); ?>" class="btn btn-danger font-roboto">Participe deste debate!</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="debate-item marco-civil">
                        <div class="text-center">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logos/marcocivil-b.png" class="img-responsive" alt="Proteção de Dados Pessoais">
                        </div>
                        <div class="description">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet cursus metus, nec feugiat sablandit diam facilisis. </p>
                        </div>
                    </div>
                    <div class="mt-sm text-center">
                        <a href="<?php echo site_url("/marcocivil"); ?>" class="btn btn-danger font-roboto">Participe deste debate!</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-md">
            <?php get_template_part('mini-tutorial'); ?>
        </div>
    </div>
<?php get_footer(); ?>
