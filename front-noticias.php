<div class="noticias mt-md">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h2 class="font-roboto red">Notícias</h2>
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
                            $title_size = 'h5';
                            the_post_thumbnail('noticia-destaque', array('class' => "img-adptive"));
                        }else{
                            $title_size = 'h3';
                        }?>
                    </div>
                    <div class="texto-destaque">
                        <?php if(has_post_thumbnail()):?>
                            <small><?php has_post_thumbnail();?></small>
                        <?php endif;?>
                        <?php if(!has_post_thumbnail()):?>
                            <?php the_date('d \d\e F \d\e Y','<small>','</small>');?>
                        <?php endif;?>
                        <p class="<?php echo $title_size;?> red">
                            <strong>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                            </strong>
                        </p>
                        <?php if(has_post_thumbnail()):?>
                        <?php the_date('d \d\e F \d\e Y','<small>','</small>');?>
                        <?php endif;?>
                        <small><?php
                        $categories = get_the_category(get_the_ID());
                        $separator = ' | ';
                        $output = '';
                        if($categories){
                        foreach($categories as $category) {
                        $output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "Veja todas as notícias em %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
                        }
                        echo trim($output, $separator);
                        }
                        ?></small>
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
                        if (trim($participacao_settings['participacao_youtube_embed']) != "") { ?>
                        <li>
                            <a href="#Youtube" data-toggle="tab" class="font-roboto">Youtube</a>
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
                        if (trim($participacao_settings['participacao_youtube_embed']) != "") { ?>
                        <div class="tab-pane" id="Youtube">
                            <?php echo $participacao_settings['participacao_youtube_embed'];  ?>
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
            get_template_part('content','archive');
            }
            } ?>
        </div>
        <br/>
        <div class="row text-center">
            <a href="<?php echo site_url('/noticias'); ?>" id="mais-noticias" class="btn btn-danger">Mostrar mais notícias</a>
        </div>
    </div>
</div>