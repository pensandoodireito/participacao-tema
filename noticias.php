<div class="noticias">
    <div class="container mt-lg well well-sm">
        <div class="row">
            <div class="col-xs-12">
                <h4 class="font-roboto red"><strong>Notícias</strong></h4>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-xs-12">
                <?php
                // Captura o último sticky post se não o ultimo post qualquer
                $args = array(
                    'posts_per_page' => 1,
                    'post__in' => get_option('sticky_posts'),
                    'ignore_sticky_posts' => 1
                );
                $sticky_news = new WP_Query($args);

                if ($sticky_news->have_posts()) {
                    while ($sticky_news->have_posts()) {
                        $sticky_news->the_post();
                        $sticky_post_id = get_the_ID();
                        ?>
                        <div class="noticia-destaque">
                            <div class="imagem-destaque">
                                <?php
                                    if ( has_post_thumbnail() ) {
                                        the_post_thumbnail('noticia-destaque', array('class' => "img-adptive"));
                                    }
                                ?>
                            </div>
                            <div class="texto-destaque">
                                <p class="h5 red">
                                    <strong>
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </strong>
                                </p>
                                 <small><?php the_date('d \d\e F \d\e Y'); ?></small>
                                <p><?php the_excerpt(); ?></p>
                            </div>
                        </div>
                    <?php
                    }

                } ?>
            </div>

            <div class="col-sm-6 col-xs-12">
                <div class="tabs-social">
                    <ul id="tabs" class="nav tabs-pd" data-tabs="tabs">
                        <?php

                        // TODO: Automatizar isso urgente!

                        $participacao_settings = get_option('participacao_settings');

                        if (trim($participacao_settings['participacao_twitter_embed']) != "") { ?>

                            <li class="active">
                                <a href="#Twitter" data-toggle="tab" class="font-roboto">Twitter</a>

                                <div class="tab-arrow"></div>
                            </li>

                        <?php }

                        if (trim($participacao_settings['participacao_facebook_embed']) != "") { ?>

                            <li>
                                <a href="#Facebook" data-toggle="tab" class="font-roboto">Facebook</a>

                                <div class="tab-arrow"></div>
                            </li>

                        <?php }

                        if (trim($participacao_settings['participacao_identica_embed']) != "") { ?>

                            <li>
                                <a href="#Identica" data-toggle="tab" class="font-roboto">Identica</a>

                                <div class="tab-arrow"></div>
                            </li>

                        <?php }

                        if (trim($participacao_settings['participacao_diaspora_embed']) != "") { ?>

                            <li>
                                <a href="#Diaspora" data-toggle="tab" class="font-roboto">Diaspora</a>

                                <div class="tab-arrow"></div>
                            </li>

                        <?php } ?>

                    </ul>
                    <div id="" class="tab-content">
                        <?php

                        // TODO: Automatizar isso urgente!

                        $participacao_settings = get_option('participacao_settings');

                        if (trim($participacao_settings['participacao_twitter_embed']) != "") { ?>

                        <div class="tab-pane active" id="Twitter">
                            <?php echo $participacao_settings['participacao_twitter_embed'];  ?>
                        </div>

                        <?php }

                        if (trim($participacao_settings['participacao_facebook_embed']) != "") { ?>

                        <div class="tab-pane" id="Facebook">
                            <?php echo $participacao_settings['participacao_facebook_embed'];  ?>
                        </div>

                        <?php }

                        if (trim($participacao_settings['participacao_identica_embed']) != "") { ?>

                        <div class="tab-pane" id="Identica">
                            <?php echo $participacao_settings['participacao_identica_embed'];  ?>
                        </div>

                        <?php }

                        if (trim($participacao_settings['participacao_diaspora_embed'] != "")) { ?>

                        <div class="tab-pane" id="Diaspora">
                            <?php echo $participacao_settings['participacao_diaspora_embed'];  ?>
                        </div>

                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row ordinarynews">

            <?php
            // Captura o último sticky post se não o ultimo post qualquer
            $args = array(
                'posts_per_page' => get_option('posts_per_page'),
                'post__not_in' => array_merge(get_option('sticky_posts'), array($sticky_post_id))
            );
            $ordinary_news = new WP_Query($args);

?>
            <script>
                var participacaoPaginasMaximas = <?php echo $ordinary_news->max_num_pages; ?>
            </script>
<?php

            if ($ordinary_news->have_posts()) {
                while ($ordinary_news->have_posts()) {
                    $ordinary_news->the_post();
                    get_template_part('noticias','box');
                }
            } ?>
        </div>
        <br/>
        <div class="row text-center">
          <button id="mais-noticias" type="button" class="btn btn-danger" onclick="carregar_noticias();">Mostrar mais notícias</button>
        </div>
    </div>
</div>
