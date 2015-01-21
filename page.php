<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

    <div class="row">
        <?php get_template_part('logo', 'mci'); ?>
        <?php get_template_part('menu', 'interno'); ?>
    </div>
    <?php
        // Start the Loop.
        while ( have_posts() ) : the_post();

            // Include the page content template.
            get_template_part( 'content', 'page' );

        endwhile;
    ?>

<?php
get_footer();
