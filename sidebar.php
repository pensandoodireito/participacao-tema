<div class="col-md-4">
    <div class="well well-sm"">
        <h5 class="red">Mais notícias:</h5>

        <?php

        $mais_noticias = new WP_Query(
            array(
                'post_type' => array('post'),
                'posts_per_page' => 5,
                'post__not_in' => array(get_the_ID())
            )
        );

        while ($mais_noticias->have_posts()) {
            $mais_noticias->the_post();
    ?>
        <div class="row mt-md">

            <div class="col-xs-5">
                <?php
                if (has_post_thumbnail() ) {
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
    <?php
        }
    ?>
    </div>
</div>