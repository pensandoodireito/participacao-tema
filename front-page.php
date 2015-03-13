<?php get_header(); ?>
   <div class="conteudo">
 
        <section id="destaque-home">
            <div class="container">
                <div class="row">
                    <div class="col-xs-7">
                        <!-- 4:3 aspect ratio -->
                        <div class="embed-responsive embed-responsive-16by9">
                          <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/EHHmVbNNvHQ?controls=1&autohide=1"></iframe>
                        </div>
                    </div>
                    <div class="col-xs-4 description-destaque font-roboto">
                        <h6 class="font-roboto">Pensando o direito</h6>
                        <h2 class="font-roboto">O que é?</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                        <p>Sed lobortis est eget tristique vestibulum. Fusce et pulvinar erat, id viverra sem. Vivamus porttitor. </p>
                    </div>
                </div>
            </div>
        </section>
    </br>    
    <div class="container">
        <h2 class="font-roboto red">Participe dos debates!</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet cursus metus, nec feugiat sablandit diam facilisis.</p>
    </div> 


<?php get_template_part('mini-tutorial'); ?>


 <section id="destaque-home-debates">       
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="font-roboto red">Debates Abertos:</h3>
                </div>
                <div class="col-md-6 text-right">
                    <p class="mt-sm">
                        <strong class="mt-xs ml-md"><a href="#">Veja todos os debates</a></strong>
                    </p>
                </div>
            </div>
            <div class="row" id="debates-home">
                <div class="col-md-4">
                    <div class="">
                     <a href="#">   
                        <div class="text-center">
                            <img src="/wp-content/themes/participacao-tema/images/home/mc-home.png" class="img-adaptative" alt="Debate">
                        </div>
                        <div class="description">
                            <strong class="red">Título do Debate</strong>
                            <p><small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet cursus metus, nec feugiat sablandit diam facilisis. </small></p>
                        </div>
                     </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="">
                     <a href="#">   
                        <div class="text-center">
                            <img src="/wp-content/themes/participacao-tema/images/home/dp-home.gif" class="img-adaptative" alt="Debate">
                        </div>
                        <div class="description">
                            <strong class="red">Título do Debate</strong>
                            <p><small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet cursus metus, nec feugiat sablandit diam facilisis. </small></p>
                        </div>
                     </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="">
                     <a href="#">   
                        <div class="text-center">
                            <img src="/wp-content/themes/participacao-tema/images/home/mc-home.png" class="img-adaptative" alt="Debate">
                        </div>
                        <div class="description">
                            <strong class="red">Título do Debate</strong>
                            <p><small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet cursus metus, nec feugiat sablandit diam facilisis. </small></p>
                        </div>
                     </a>
                    </div>

                </div>                
            </div>
        </div>
     </section>   
    </div>


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
                                 <small>10 de maio de 2015</small>
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
                var pensandoPaginasMaximas = <?php echo $ordinary_news->max_num_pages; ?>
            </script>
<?php

            if ($ordinary_news->have_posts()) {
                while ($ordinary_news->have_posts()) {
                    $ordinary_news->the_post();
                    get_template_part('noticias','box');
                }
            } ?>
        </div>
</br>
    </div>
</div>





    <div class="container">
            <div class="row mt-md" id="publicacoes">
                <div class="col-md-8" id="publicacao-destaque">
                        <h3 class="font-roboto red">Publicações da Série Pensando o Direito</h3>
                      <div class="panel-body">
                        <div class="col-xs-6 col-md-4">
                            <a href="#" class="nounderline">
                              <div class="destaque text-center"> 
                               <p>Título da publicação</p>       
                              </div>
                            </a>
                        </div>
                        <div class="description col-md-8">
                            <h4 class="font-roboto red">Volume 50</h4>
                            <p><mark>Data da publicação: 11 de maio 2013</mark></p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet cursus metus, nec feugiat sablandit diam facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet cursus metus, nec feugiat sablandit diam facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet cursus metus, nec feugiat sablandit diam facilisis. <a href="#">Leia mais</a> 
                            </p>
                            <div class="row">
                             <div class="col-md-12 text-left">
                                <div class="btn-group mt-sm" role="group">
                                  <button type="button" class="btn btn-default">BAIXAR</button>
                                  <button type="button" class="btn btn-danger">VISUALIZAR</button>
                                </div>
                             </div>  
                           </div>   
                        </div>
                    </div>
                </div>
                <div class="col-md-4 well box-publicacao">
                    <h5 class="red">Saiba mais sobre a série Pensando o Direito</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet cursus metus, nec feugiat sablandit diam facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet</p>
                    <strong><a href="#">Todas as publicações</a></strong></br>
                    <strong><a href="#">Editais de participação</a></strong>
                    </div>
                </div>
            </div>
        </div>



<?php get_footer(); ?>