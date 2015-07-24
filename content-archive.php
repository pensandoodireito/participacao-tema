<div class="col-sm-6 col-xs-12 line-4">
    <div class="row  mt-md">
        <div class="col-xs-5">
            <?php
                if ( has_post_thumbnail() ) {
                    the_post_thumbnail('noticia-lista', array('class' => "img-adptive"));
                } else { ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/noticia-padrao.gif" class="img-adptive" alt="Imagem notícia" />
               <?php }
            ?>
        </div>
        <div class="col-xs-7 pl-0">
            <p class="h6 red mt-0">
                <strong>
                   <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </strong>
            </p>
            <small><?php the_date('d \d\e F \d\e Y'); ?></small> |
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
        </div>
    </div>
</div>