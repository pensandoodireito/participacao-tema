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
            <small><?php the_date('d \d\e F \d\e Y'); ?></small>
        </div>
    </div>
</div>