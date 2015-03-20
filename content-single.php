
	<div class="row">
		<div class="col-xs-8 text-left">
		    <h4 class="red"><strong><?php the_title(); ?></strong></h4>
		    <p><mark>10 de maio de 2015</mark></p>
		    <?php the_content(); ?>
		</div> <!-- /col-xs -->

		<div class="col-xs-4 well well-sm">
			<h5 class="red">Mais notícias:</h5>
		</br>
         
<!-- ajustar - apenas para mostrar como a lista deve ficar -->
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
