<div class="noticias">
    <div class="container mt-lg">
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

                        $pensandoodireito_settings = get_option('pensandoodireito_settings');

                        if (trim($pensandoodireito_settings['pensandoodireito_twitter_embed']) != "") { ?>

                            <li class="active">
                                <a href="#Twitter" data-toggle="tab" class="font-roboto">Twitter</a>

                                <div class="tab-arrow"></div>
                            </li>

                        <?php }

                        if (trim($pensandoodireito_settings['pensandoodireito_facebook_embed']) != "") { ?>

                            <li>
                                <a href="#Facebook" data-toggle="tab" class="font-roboto">Facebook</a>

                                <div class="tab-arrow"></div>
                            </li>

                        <?php }

                        if (trim($pensandoodireito_settings['pensandoodireito_identica_embed']) != "") { ?>

                            <li>
                                <a href="#Identica" data-toggle="tab" class="font-roboto">Identica</a>

                                <div class="tab-arrow"></div>
                            </li>

                        <?php }

                        if (trim($pensandoodireito_settings['pensandoodireito_diaspora_embed']) != "") { ?>

                            <li>
                                <a href="#Diaspora" data-toggle="tab" class="font-roboto">Diaspora</a>

                                <div class="tab-arrow"></div>
                            </li>

                        <?php } ?>

                    </ul>
                    <div id="" class="tab-content">
                        <?php

                        // TODO: Automatizar isso urgente!

                        $pensandoodireito_settings = get_option('pensandoodireito_settings');

                        if (trim($pensandoodireito_settings['pensandoodireito_twitter_embed']) != "") { ?>

                        <div class="tab-pane active" id="Twitter">
                            <?php echo $pensandoodireito_settings['pensandoodireito_twitter_embed'];  ?>
                        </div>

                        <?php }

                        if (trim($pensandoodireito_settings['pensandoodireito_facebook_embed']) != "") { ?>

                        <div class="tab-pane" id="Facebook">
                            <?php echo $pensandoodireito_settings['pensandoodireito_facebook_embed'];  ?>
                        </div>

                        <?php }

                        if (trim($pensandoodireito_settings['pensandoodireito_identica_embed']) != "") { ?>

                        <div class="tab-pane" id="Identica">
                            <?php echo $pensandoodireito_settings['pensandoodireito_identica_embed'];  ?>
                        </div>

                        <?php }

                        if (trim($pensandoodireito_settings['pensandoodireito_diaspora_embed'] != "")) { ?>

                        <div class="tab-pane" id="Diaspora">
                            <?php echo $pensandoodireito_settings['pensandoodireito_diaspora_embed'];  ?>
                        </div>

                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <?php
            // Captura o último sticky post se não o ultimo post qualquer
            $args = array(
                'posts_per_page' => 4,
                'post__not_in' => array_merge(get_option('sticky_posts'), array($sticky_post_id))
            );
            $ordinary_news = new WP_Query($args);

            if ($ordinary_news->have_posts()) {
                while ($ordinary_news->have_posts()) {
                    $ordinary_news->the_post();
                    ?>
                    <div class="col-sm-6 col-xs-12">
                        <div class="row  mt-md">
                            <div class="col-xs-5">
                                <?php
                                    if ( has_post_thumbnail() ) {
                                        the_post_thumbnail('noticia-lista', array('class' => "img-adptive"));
                                    }
                                ?>
                            </div>
                            <div class="col-xs-7 pl-0">
                                <p class="h6 red mt-0">
                                    <strong>
                                       <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </strong>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php
                }
            } ?>
        </div>
        <div class="mt-md">
            <p>
                <a href="#" class="blue"><strong>Todas as notícias</strong></a>
            </p>
        </div>
    </div>
</div>