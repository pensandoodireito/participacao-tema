
	<div class="row">
		<div class="col-md-8 text-left">
		    <h4 class="red"><strong><?php the_title(); ?></strong></h4>
		    <p><mark><?php the_date('d \d\e F \d\e Y'); ?></mark>
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
            </p>
		    <?php the_content(); ?>
		</div> <!-- /col-xs -->

		<?php get_sidebar(); ?>
	</div>
