<?php
get_header(); ?>
    <div class="row">
        <?php get_template_part('menu', 'horizontal'); ?>
    </div>
    <div class="container">
        <?php
        // Start the Loop.
        while (have_posts()) : the_post();
            // Include the page content template.
            get_template_part('content', 'single');
            comments_template();
        endwhile;
        ?>
    </div>
<?php
get_footer();